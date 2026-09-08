<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Services\ModuleService;

use App\Models\Country;

use App\Models\Character;

use App\Models\Creature;

use App\Models\User;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    protected $moduleService;


    public function __construct(ModuleService $moduleService){

      $this->moduleService = $moduleService;  

  }
    /**
     * Display a listing of the resource.
     */
    public function getcharacter()
    { 

        $userid = 1;


        $data = User::select('p.id', 'p.player_name','p.player_img','p.player_px','p.player_py')
        ->join('users_players as up', 'up.user_id', '=', 'users.id')
        ->join('players as p', 'p.id', '=', 'up.user_id') 
        ->where('users.id', $userid)           
        ->firstOrFail();
        // ->first();    


        return response()->json($data);      

    }

    public function getcreatures()
    { 


     $total = Creature::select('id', 'creature_name','creature_img')           
     ->get()
     ->count();

     $randcreature = rand(1,$total);
     // posicion x bitmap
     $randpx = rand(1,255);
     $randpy = rand(1,255);

     $data = Creature::select('id', 'creature_name','creature_img','creature_px','creature_py')     
     ->where('creatures.id', $randcreature)
     ->firstOrFail();

     $updateposition = DB::table('creatures')
     ->where('id', $data->id)
     ->update(['creature_px' =>  $randpx,'creature_py' =>  $randpy]);

     $creaturerandom = Creature::select('id', 'creature_name','creature_img','creature_px','creature_py')           
     ->where('creatures.id', $data->id)
     ->where('maincreature_id', 1)
     ->firstOrFail();   


     return response()->json($creaturerandom);      

 }

 public function moveplayer()
 {

    $userid = 1;

    


    $data = User::select('p.id', 'p.player_name','p.player_img','p.player_px','p.player_py')
    ->join('users_players as up', 'up.user_id', '=', 'users.id')
    ->join('players as p', 'p.id', '=', 'up.user_id') 
    ->where('users.id', $userid)           
    ->firstOrFail();

    // $sumpx = $data->player_px + 30;
    // $sumpy = $data->player_py + 30;

    $bitmap1_x = 100.0;
    $bitmap1_y = 150.0;

    $bitmap2_x = 50.0;
    $bitmap2_y = 50.0;

    $bitmap1_x += $bitmap2_x;
    $bitmap1_y += $bitmap2_y;

    // return response()->json($sumpx); 

    $updateposition = DB::table('players')
    ->where('id', $data->id)
    // ->update(['player_px'  => $sumpx]);
    ->update(['player_px' =>  $bitmap1_x,'player_py' =>  $bitmap1_y]);     


    // $updateposition = DB::table('players')
    // ->where('id', $data->id)
    // // ->update(['player_px'  => $sumpx]);
    // ->update(['player_px' =>  $sumpx,'player_py' =>  $sumpy]);

    
    // return response()->json($updateposition);      

}

public function getcharacters($userid)
{ 

    $mc_id = MainCategory::select('maincategorys.id','maincategorys.maincategory_url','maincategorys.maincategory_name')   
    ->where('maincategorys.maincategory_url', $subcategory)
    ->firstOrFail();    


    return response()->json($data);      

}




public function countrys()
{


    $data = Country::select('id', 'country_name')           
    ->get();    


    return response()->json($data);

}

public function test()
{          


    $data = $this->moduleService->responseGetByPlayerName('/fdsnws/event/1/query?format=geojson&starttime=2026-06-24&endtime=2026-06-28&minmagnitude=7.5');



    return view('test', [          
      'datas' => $data
         // 'datas' => $data->features[0]->properties
      // 'categorys2' => $category2     
  ]);


}

public function getdata()
{

   $starttime = date("Y-m-d");

   $totalnow = $this->moduleService->responseGetByPlayerName('/fdsnws/event/1/count?format=geojson&starttime='.$starttime);

   $data = $this->moduleService->responseGetByPlayerName('/fdsnws/event/1/query?format=geojson&starttime=2026-07-02&limit='.$totalnow->count);

       // $data = $this->moduleService->responseGetByPlayerName('/fdsnws/event/1/query?format=geojson&starttime=2026-07-02&limit=10');

   return response()->json($data->features);

        // return response()->json([$data->features[0]->properties,$data->features[0]->geometry]); 

       // $starttime = date("Y-m-d");

   $magnitude = rand(5, 7);



        // $data = $this->moduleService->responseGetByPlayerName('/fdsnws/event/1/query?format=geojson&starttime=2026-06-24&endtime=2026-06-28&minmagnitude=7.5');

   $data = $this->moduleService->responseGetByPlayerName('/fdsnws/event/1/query?format=geojson&starttime='.$starttime.'&minmagnitude='.$magnitude);



   return response()->json([$data->features[0]->properties,$data->features[0]->geometry]);




}

public function getdatapost(Request $request)
{

    // $request->magnitude
    // $request->starttime 

    // return response()->json([$request->magnitude,$request->starttime]); 


        // $data = $this->moduleService->responseGetByPlayerName('/fdsnws/event/1/query?format=geojson&starttime=2026-06-24&endtime=2026-06-28&minmagnitude=7.5');

       // $data = $this->moduleService->responseGetByPlayerName('/fdsnws/event/1/query?format=geojson&starttime='.$request->starttime.'&minmagnitude='.$request->magnitude);

    $data = $this->moduleService->responseGetByPlayerName('/fdsnws/event/1/query?format=geojson&starttime='.$request->starttime.'&minmagnitude='.$request->magnitude.'&offset=1');

    // $dbCountry = country::select('country_name')
    // ->where('country_name', $request->country)
    // ->first();

    // return response()->json($request->country);

    $mdata = similar_text($data->features[0]->properties->place, $request->country, $percent);

    // if ($data->features[0]->place ) {
    //     // code...
    // }

    // return response()->json($mdata);

    // return response()->json($mdata);

     // return response()->json($data->features[0]->properties->place);

    // if ($percent >= 10) {
    if ($mdata >= 5) {
        // echo "Las palabras son muy similares. Coinciden en un: " . round($porcentaje) . "%";

        // return response()->json(round($percent));

       return response()->json([$data->features[0]->properties,$data->features[0]->geometry]); 
   }else{

     return response()->json([$data->features[0]->properties,$data->features[0]->geometry]);

 }



       // $data = $this->moduleService->responseGetByPlayerName('/fdsnws/event/1/query?format=geojson&starttime='.$request->starttime.'&minmagnitude='.$request->magnitude.'&offset=1');


    // return response()->json([$data->features[0]->properties,$data->features[0]->geometry]);


}

public function catalogs()
{       

    $data = $this->moduleService->responseGetByPlayerName('/fdsnws/event/1/catalogs');

    print_r($data);

    exit;
    return view('home');
}

//consultas tienen query en parametros
public function consultas()
{       

    $data = $this->moduleService->responseGetByPlayerName('/fdsnws/event/1/query?format=geojson&starttime=2026-06-24&endtime=2026-06-28&minmagnitude=7.5');

    return response()->json($data);


    print_r($data);

    exit;
    return view('home');
}

public function totaleventsnow()
{ 

  $starttime = date("Y-m-d");      

    // $data = $this->moduleService->responseGetByPlayerName('/fdsnws/event/1/query?format=geojson&starttime=2026-06-24&endtime=2026-06-28&minmagnitude=7.5');


  $data = $this->moduleService->responseGetByPlayerName('/fdsnws/event/1/count?format=geojson&starttime='.$starttime);

  $datax = $this->moduleService->responseGetByPlayerName('/fdsnws/event/1/query?format=geojson&starttime='.$starttime);

    // foreach ($datax as $data) {

    //     return response()->json($data->FeatureCollection);
    // }

        // return response()->json($data->features[0]->properties->mag);

        // return response()->json($data->features);

        // return response()->json([$data->features[0]->properties,$data->features[0]->geometry]);

  return response()->json([$data,$datax->features[0]->properties]);  



  return response()->json($data);

}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
