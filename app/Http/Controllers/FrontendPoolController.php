<?php

namespace Nhlpool\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Nhlpool\Pool;
use UxWeb\SweetAlert\SweetAlert as Alert;

class FrontendPoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pools = Pool::with('pool_type')->paginate(15);

        return view('pool/index')->withPools($pools);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pool = Pool::with('pool_type')->findOrFail($id);

        return view('pool/show')->withPool($pool);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Join a pool.
     *
     * @param int $id
     *
     * @return Response
     */
    public function join($id)
    {
        $user = Auth::user();
        $user->join_pool($id);

        Alert::success('You joined this pool sucessfully', 'Sucess!')->autoclose(3000);

        return back();
    }
}
