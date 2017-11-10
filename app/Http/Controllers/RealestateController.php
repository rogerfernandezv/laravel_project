<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Realestate;
use App\RealestateType;
use App\RealestateBusiness;
use App\File;
use Illuminate\Support\Facades\Storage;

class RealestateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $realestates = Realestate::paginate(2);
        return view('realestate.index', compact('realestates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = RealestateType::all();
        $business = RealestateBusiness::all();

        return view('realestate.create', compact('types', 'business'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Validação
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);


        $hash = bin2hex(random_bytes(4));

        if($request->has('realestate_id'))
        {
            $realestate = Realestate::findOrfail($request->all()['realestate_id']);
            $realestate->fill($request->all());

        }
        else
        {
        //salvando dados imoveis
            $realestate = new Realestate($request->all());
            $realestate->cod_realestate = $hash;
            $realestate->save();
            $realestate->cod_realestate = strval($realestate->id).$realestate->cod_realestate;
        }
        
        $realestate->save();

        if($request->hasFile('img'))
        {
            if($request->has('realestate_id') && count($realestate->files) > 0 )
            {
                if(Storage::disk('public')->exists($realestate->files[0]->path))
                        Storage::disk('public')->delete($realestate->files[0]->path);

                $realestate->files()->delete();
            }
            //Salvando imagem
            $image = Storage::disk('public')->putFile('files', $request->file('img'), 'public');

            $file = new File;
            $file->type = 'image';
            $file->path = $image;
            $file->name = preg_replace('/.*?\//','', $image);

            $realestate->files()->save($file);
        }

        return redirect()->route('realestate_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $item =  $request->all()['search'];

        $realestates = Realestate::where('cod_realestate', 'like', '%'. strtolower($item) . '%')
                                ->orWhere('id', intval($item))
                                ->paginate(2);

        return view('realestate.index', compact('realestates'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function xml()
    {
        return view('realestate.xml');
    }

    public function parsexml(Request $request)
    {
        if($request->hasFile('xml'))
        {
            $xml = Storage::disk('public')->putFile('files', $request->file('xml'), 'public');
            $xml_url = Storage::disk('public')->url($xml);
            //return $xml_url;
            $xml_file = simplexml_load_file($xml_url);

            $count = 0;
            foreach($xml_file->Imoveis->Imovel as $imovel)
            {
                $count++;
                if($count <= 10)
                {
                    $realestate = new Realestate;

                    $tipo_imovel = $imovel->TipoImovel;

                    if(preg_match('/[cC]asa/', $tipo_imovel))
                    {
                        $realestate->realestate_type_id = 4;
                    }
                    else if(preg_match('/[aA]partament/', $tipo_imovel))
                        $realestate->realestate_type_id = 3;
                    else
                        $realestate->realestate_type_id = 4;


                    $preco_venda = doubleval($imovel->PrecoVenda);
                    $preco_locacao = doubleval($imovel->PrecoLocacao);
                    $preco_locacao_temporada = doubleval($imovel->PrecoLocacaoTemporada);

                    if(count($preco_venda) > 0)
                    {
                        $realestate->price = $preco_venda;
                        $realestate->realestate_business_id = 4;
                    }
                    else if(count($preco_locacao) > 0)
                    {
                        $realestate->price = $preco_locacao;
                        $realestate->realestate_business_id = 3;
                    }
                    else
                    {
                        $realestate->price = $preco_locacao_temporada;
                        $realestate->realestate_business_id = 5;
                    }

                    $realestate->cod_realestate = $imovel->CodigoImovel;
                    $realestate->title = '';
                    $realestate->address = 'No address';
                    $realestate->cep = $imovel->CEP;
                    $realestate->city = $imovel->Cidade;
                    $realestate->state = $imovel->UF;
                    $realestate->district = $imovel->Bairro;
                    $realestate->number = $imovel->Numero;
                    $realestate->complement = $imovel->Complemento;
                    
                    $realestate->surface = $imovel->AreaUtil;
                    $realestate->bedroom = $imovel->QtdDormitorios;
                    $realestate->bathroom = $imovel->QtdBanheiros;
                    $realestate->livingroom = $imovel->QtdSalas;
                    $realestate->suite = $imovel->QtdSuites;
                    $realestate->garage = $imovel->QtdVagas;
                    $realestate->description = $imovel->Observacao;


                    $realestate->save();

                    //poderia usar api para pegar rua mas estou sem tempo
                }
                else
                    break;

            }
        }

        return redirect()->route('realestate_index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = RealestateType::all();
        $business = RealestateBusiness::all();

        $realestate = Realestate::findOrfail($id);

        return view('realestate.create', compact('types', 'business', 'realestate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $realestate = Realestate::findOrfail($id);
        if( count($realestate->files) > 0 )
        {
            if(Storage::disk('public')->exists($realestate->files[0]->path))
                    Storage::disk('public')->delete($realestate->files[0]->path);

            $realestate->files()->delete();
        }

        $realestate->delete();


        return redirect()->route('realestate_index');

    }
}
