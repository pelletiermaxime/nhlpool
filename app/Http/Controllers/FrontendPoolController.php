<?php

namespace Nhlpool\Http\Controllers;

use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Nhlpool\Pool;
use Nhlpool\PoolUser;
use UxWeb\SweetAlert\SweetAlert as Alert;

class FrontendPoolController extends Controller
{
    use FormBuilderTrait;

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['join', 'update']]);
    }

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

        $form = $this->form('Nhlpool\PoolTypes\TeamsScoreTypeForm', [
            'method' => 'PUT',
            'url' => route('pool.update', $id),
        ], ['pool' => $pool]);

        return view('pool/show')->withPool($pool)->withForm($form);
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
    public function update(Request $request, $pool_id)
    {
        $teamIDs = $request->input('teams');

        $pooluser = PoolUser::pool($pool_id)->first();
        $pooluser->setChoices(['teams' => [$teamIDs]]);

        Alert::success('Choices saved successfully', 'Success!')->autoclose(3000);

        return back();
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

    public function join(int $id) : RedirectResponse
    {
        Auth::user()->join_pool($id);

        Alert::success('You joined this pool successfully', 'Success!')->autoclose(3000);

        return back();
    }
}
