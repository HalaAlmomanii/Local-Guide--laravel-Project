<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($guide_id,$place)
    {

//dd($guide_id);
//dd($place);
// Place::where('id', $place_id)->with(['guide' => function ($query) use($request) {
//            $query->with('language')->whereHas('language', function (Builder $query) use ($request){
//                $query->where('language_id','=',$request['language_id']);
//
//$booking = Reservation::with('guide')->where('id',$guide_id);
//return $comment;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($guide_id,$from,$to)
    {
//        dd($from);
        Reservation::create (
            [
                'from'=>$from,
                'to'=>$to,
                 'guides_id' =>$guide_id,
                'user_id'=>1
            ]
        );
        dd('ok');
    }


    public function profile($place_id)
    {
//        dd("profile");
         $info= Reservation::where('user_id', 1)->with(['guide' => function ($query) use($place_id) {
            $query->with('place')->whereHas('place', function (Builder $query) use ($place_id){
                $query->where('place_id','=',$place_id);
            });
        }])->get();
//dd($info);
  return view('user.index',compact('info'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    public  function guidetime(Request $request)
  {


    $info= Reservation::where('guides_id', $request->guides_id)->with('user')->get();
//    dd($info);
    return view('guide.show',compact('info'));

    }
}
