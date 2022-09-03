<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servers = Server::all();
        return view('auth.server', [
            'servers' => $servers->load(['status'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    public function refresh(Server $server)
    {
        try {
            $request    = Http::post("https://app.jagoan.cloud/1.0/environment/control/rest/getenvinfo?envName=$server->name&session=6f5b7fcaf8f64cf58c9f0e87f4d67c2f310b9dab");
            $status     = $request['env']['status'];
            $status_id  = ($status == 1 || $status == 2) ? $status : 0;
            Server::where('id', $server->id)->update([
                'url'       => $request['env']['extdomains'][0],
                'status_id' => $status_id,
            ]);
            return redirect('kelola-server')->with('success', "Informasi Server $server->name berhasil diperbarui");
        } catch (\Throwable $th) {
            return redirect('kelola-server')->with('failed', "Informasi Server $server->name gagal diperbarui");
        }
    }

    public function status(Server $server, $request)
    {
        try {
            if ($request == 'on') {
                $request    = Http::post("https://app.jagoan.cloud/1.0/environment/control/rest/startenv?envName=$server->name&session=6f5b7fcaf8f64cf58c9f0e87f4d67c2f310b9dab");
            } elseif ($request == 'off') {
                $request    = Http::post("https://app.jagoan.cloud/1.0/environment/control/rest/stopenv?envName=$server->name&session=6f5b7fcaf8f64cf58c9f0e87f4d67c2f310b9dab");
            } else {
                throw new Exception("Error Processing Request", 1);
            }

            $status     = $request['nodeStatus'][0]['current'];
            $status_id  = ($status == 1 || $status == 2) ? $status : 0;
            Server::where('id', $server->id)->update([
                'status_id' => $status_id,
            ]);
            return redirect('kelola-server')->with('success', "Informasi Server $server->name berhasil diperbarui");
        } catch (\Exception $th) {
            return redirect('kelola-server')->with('failed', "Informasi Server $server->name gagal diperbarui");
        }
    }
}
