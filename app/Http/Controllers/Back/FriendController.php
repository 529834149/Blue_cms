<?php

namespace App\Http\Controllers\Back;

use App\Service\FriendService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FriendController extends Controller
{

    /**
     * FriendController constructor.
     * @param FriendService $friendService
     */
    public function __construct(FriendService $friendService)
    {
        $this->middleware('auth.back:back');
        $this->friendService = $friendService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('ok');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.friend.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->friendService->store($request);
        return redirect('back/friend');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($this->friendService->friendRepository->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $friend = $this->friendService->friendRepository->find($id);
        return view('back.friend.edit', compact('friend'));
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
        $this->friendService->update($request, $id);
        return redirect('back/friend');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->friendService->friendRepository->delete($id);
        return redirect()->back();
    }
}