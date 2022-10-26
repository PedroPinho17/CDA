<?php

use App\Mail\MensagemTesteMail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware(['auth','verified','no_back']);


    //auth -> verifica se esta logado
    //verified -> verifica se o email foi verificado

Route::middleware(['auth','verified','no_back'])->prefix('/admin')->group(function(){

    //user
    Route::get('user/exportacao/{extensao}', 'App\Http\Controllers\AdminUserController@exportacao')
    ->name('user.exportacao')
    ->middleware(['auth','verified','no_back']);

    Route::get('user/exportar', 'App\Http\Controllers\AdminUserController@exportar')
    ->name('user.exportar')
    ->middleware(['auth','verified','no_back']);

    Route::get('user/profile', 'App\Http\Controllers\AdminUserController@profile')
    ->name('user.profile')
    ->middleware(['auth','verified','no_back']);

    Route::put('user/profile/edit/{user} ', 'App\Http\Controllers\AdminUserController@update_profile')
    ->name('user.profile.edit')
    ->middleware(['auth','verified','no_back']);

    Route::put('user/profile/edit/password/{user} ', 'App\Http\Controllers\AdminUserController@changePassword')
    ->name('user.profile.editPassword')
    ->middleware(['auth','verified','no_back']);

    Route::put('user/profile/edit/detalhes/{user} ', 'App\Http\Controllers\AdminUserController@change_Detalhes')
    ->name('user.profile.editDetalhes')
    ->middleware(['auth','verified','no_back']);

    Route::put('user/profile/edit/foto/{user} ', 'App\Http\Controllers\AdminUserController@change_profile_picture')
    ->name('user.profile.editFoto')
    ->middleware(['auth','verified'],'no_back');

    Route::get('user/profile/delete/task/{task} ', 'App\Http\Controllers\AdminUserController@delete_task')
    ->name('user.profile.deleteTask')
    ->middleware(['auth','verified','no_back']);

    Route::resource('user', 'App\Http\Controllers\AdminUserController')
    ->middleware(['auth','verified','no_back']);

    //tipoUsers
    Route::resource('tipoUser', 'App\Http\Controllers\AdminTipoUsersController')
    ->middleware(['auth','verified','no_back']);

    //task
    Route::resource('task', 'App\Http\Controllers\AdminTaskController')
    ->middleware(['auth','verified','no_back']);

    //Posts
    Route::get('posts/exportacao/{extensao}', 'App\Http\Controllers\AdminPostsController@exportacao')
    ->name('posts.exportacao')
    ->middleware(['auth','verified','no_back']);

    Route::get('posts/exportar', 'App\Http\Controllers\AdminPostsController@exportar')
    ->name('posts.exportar')
    ->middleware(['auth','verified','no_back']);

    Route::resource('posts', 'App\Http\Controllers\AdminPostsController')
    ->middleware(['auth','verified','no_back']);

    //Presidente
    Route::get('presidente/exportacao/{extensao}', 'App\Http\Controllers\AdminPresidenteController@exportacao')
    ->name('presidente.exportacao')
    ->middleware(['auth','verified','no_back']);

    Route::get('presidente/exportar', 'App\Http\Controllers\AdminPresidenteController@exportar')
    ->name('presidente.exportar')
    ->middleware(['auth','verified','no_back']);

    Route::resource('presidente', 'App\Http\Controllers\AdminPresidenteController')
    ->middleware(['auth','verified','no_back']);
    //auth

    //Membros
    Route::get('membro/exportacao/{extensao}', 'App\Http\Controllers\AdminMembrosController@exportacao')
    ->name('membro.exportacao')
    ->middleware(['auth','verified','no_back']);

    Route::get('membro/exportar', 'App\Http\Controllers\AdminMembrosController@exportar')
    ->name('membro.exportar')
    ->middleware(['auth','verified','no_back']);

    Route::resource('membro', 'App\Http\Controllers\AdminMembrosController')
    ->middleware(['auth','verified','no_back']);

    //Membros Detalhes
    Route::get('detalhe-membro/exportacao/{extensao}', 'App\Http\Controllers\AdminDetalhesMembrosController@exportacao')
    ->name('detalhe-membro.exportacao')
    ->middleware(['auth','verified','no_back']);

    Route::get('detalhe-membro/exportar', 'App\Http\Controllers\AdminDetalhesMembrosController@exportar')
    ->name('detalhe-membro.exportar')
    ->middleware(['auth','verified','no_back']);

    Route::resource('detalhe-membro', 'App\Http\Controllers\AdminDetalhesMembrosController')
    ->middleware(['auth','verified','no_back']);

    //Galeria
    Route::get('galeria/exportacao/{extensao}', 'App\Http\Controllers\AdminGaleriaController@exportacao')
    ->name('galeria.exportacao')
    ->middleware(['auth','verified','no_back']);

    Route::get('galeria/exportar', 'App\Http\Controllers\AdminGaleriaController@exportar')
    ->name('galeria.exportar')
    ->middleware(['auth','verified','no_back']);

    Route::resource('galeria', 'App\Http\Controllers\AdminGaleriaController')
    ->middleware(['auth','verified','no_back']);

    //Patrocinadores
    Route::get('patrocinadores/exportacao/{extensao}', 'App\Http\Controllers\AdminPatrocinadoresController@exportacao')
    ->name('patrocinadores.exportacao')
    ->middleware(['auth','verified','no_back']);

    Route::get('patrocinadores/exportar', 'App\Http\Controllers\AdminPatrocinadoresController@exportar')
    ->name('patrocinadores.exportar')
    ->middleware(['auth','verified','no_back']);

    Route::resource('patrocinadores', 'App\Http\Controllers\AdminPatrocinadoresController')
    ->middleware(['auth','verified','no_back']);

    //Escalão
    //nome da rota -> Controller
    Route::get('escalao/exportacao/{extensao}', 'App\Http\Controllers\AdminEscalaoController@exportacao')
    ->name('escalao.exportacao')
    ->middleware(['auth','verified','no_back']);

    Route::get('escalao/exportar', 'App\Http\Controllers\AdminEscalaoController@exportar')
    ->name('escalao.exportar')
    ->middleware(['auth','verified','no_back']);

    Route::resource('escalao', 'App\Http\Controllers\AdminEscalaoController')
    ->middleware(['auth','verified','no_back']);

    //Equipa Tecnica
    Route::get('equipaTec/exportacao/{extensao}', 'App\Http\Controllers\AdminEquipaTecController@exportacao')
    ->name('equipaTec.exportacao')
    ->middleware(['auth','verified','no_back']);

    Route::get('equipaTec/exportar', 'App\Http\Controllers\AdminEquipaTecController@exportar')
    ->name('equipaTec.exportar')
    ->middleware(['auth','verified','no_back']);

    Route::resource('equipaTec', 'App\Http\Controllers\AdminEquipaTecController')
    ->middleware(['auth','verified','no_back']);

    //Equipa Tecnica Detalhes
    Route::get('tpFuncao-equipaTec/exportacao/{extensao}', 'App\Http\Controllers\AdmintpFuncaoEquipaTecController@exportacao')
    ->name('tpFuncao-equipaTec.exportacao')
    ->middleware(['auth','verified','no_back']);

    Route::get('tpFuncao-equipaTec/exportar', 'App\Http\Controllers\AdmintpFuncaoEquipaTecController@exportar')
    ->name('tpFuncao-equipaTec.exportar')
    ->middleware(['auth','verified','no_back']);

    Route::resource('tpFuncao-equipaTec', 'App\Http\Controllers\AdmintpFuncaoEquipaTecController')
    ->middleware(['auth','verified','no_back']);

    //Equipa
    Route::get('equipa/exportacao/{extensao}', 'App\Http\Controllers\AdminEquipaController@exportacao')
    ->name('equipa.exportacao')
    ->middleware(['auth','verified','no_back']);

    Route::get('equipa/exportar', 'App\Http\Controllers\AdminEquipaController@exportar')
    ->name('equipa.exportar')
    ->middleware(['auth','verified','no_back']);

    Route::resource('equipa', 'App\Http\Controllers\AdminEquipaController')
    ->middleware(['auth','verified','no_back']);

    //Jogadores
    Route::get('jogadores/exportacao/{extensao}', 'App\Http\Controllers\AdminJogadoresController@exportacao')
    ->name('jogadores.exportacao')
    ->middleware(['auth','verified','no_back']);

    Route::get('jogadores/exportar', 'App\Http\Controllers\AdminJogadoresController@exportar')
    ->name('jogadores.exportar')
    ->middleware(['auth','verified','no_back']);

    Route::resource('jogadores', 'App\Http\Controllers\AdminJogadoresController')
    ->middleware(['auth','verified','no_back']);

    //Detalhes Jogadores
    Route::get('detalhes_jogadores/exportacao/{extensao}', 'App\Http\Controllers\AdminDetalhesJogadoresController@exportacao')
    ->name('detalhes_jogadores.exportacao')
    ->middleware(['auth','verified','no_back']);

    Route::get('detalhes_jogadores/exportar', 'App\Http\Controllers\AdminDetalhesJogadoresController@exportar')
    ->name('detalhes_jogadores.exportar')
    ->middleware(['auth','verified','no_back']);

    Route::resource('detalhes_jogadores', 'App\Http\Controllers\AdminDetalhesJogadoresController')
    ->middleware(['auth','verified','no_back']);

    //jogos
    Route::get('jogos/exportacao/{extensao}', 'App\Http\Controllers\AdminJogosController@exportacao')
    ->name('jogos.exportacao')
    ->middleware(['auth','verified','no_back']);

    Route::get('jogos/exportar', 'App\Http\Controllers\AdminJogosController@exportar')
    ->name('jogos.exportar')
    ->middleware(['auth','verified','no_back']);

    Route::resource('jogos', 'App\Http\Controllers\AdminJogosController')
    ->middleware(['auth','verified','no_back']);

    //Links para jogos
    Route::get('afa/exportacao/{extensao}', 'App\Http\Controllers\AdminAfaController@exportacao')
    ->name('afa.exportacao')
    ->middleware(['auth','verified','no_back']);

    Route::get('afa/exportar', 'App\Http\Controllers\AdminAfaController@exportar')
    ->name('afa.exportar')
    ->middleware(['auth','verified','no_back']);

    Route::resource('afa', 'App\Http\Controllers\AdminAfaController')
    ->middleware(['auth','verified','no_back']);

    //Loja
    Route::get('loja/exportacao/{extensao}', 'App\Http\Controllers\AdminLojaController@exportacao')
    ->name('loja.exportacao')
    ->middleware(['auth','verified','no_back']);

    Route::get('loja/exportar', 'App\Http\Controllers\AdminLojaController@exportar')
    ->name('loja.exportar')
    ->middleware(['auth','verified','no_back']);

    Route::resource('loja', 'App\Http\Controllers\AdminLojaController')
    ->middleware(['auth','verified','no_back']);

    //Estado Produtos
    Route::resource('estadoProdutos', 'App\Http\Controllers\AdminEstadoProdutosController')
    ->middleware(['auth','verified','no_back']);
});

Route::get('/mensagem-teste', function (){
    return new MensagemTesteMail();
    //Mail::to('ClubeDesportivoArrifanense1922@gmail.com')->send(new MensagemTesteMail());
    //return 'Mensagem enviada com sucesso!';
});

Route::get('/teste','App\Http\Controllers\HomePageController@teste')->name('site.teste');

Route::get('/','App\Http\Controllers\HomePageController@principal')->name('site.index');
Route::get('/loja','App\Http\Controllers\LojaController@loja')->name('site.loja');
//Route::get('/jogos','App\Http\Controllers\JogosController@jogos')->name('site.jogos');
Route::get('/contato/{reservar?}','App\Http\Controllers\ContatoController@contato')->name('site.contato');
Route::post('/send',[ContactController::class, 'send'])->name('send.email');

Route::prefix('/clube')->group(function(){
    Route::get('/historia','App\Http\Controllers\HistoriaController@index')->name('site.historia');
    Route::get('/presidente', 'App\Http\Controllers\presidenteController@index')->name('site.presidente');

    //Route::get('/momentosHistoricos', 'momentosHistoricosController@index')->name('site.momentosHistoricos');
    Route::get('/campos', 'App\Http\Controllers\camposController@index')->name('site.campos');
    Route::get('/galeria', 'App\Http\Controllers\GaleriaController@index')->name('site.galeria');
    Route::get('/patrocinadores', 'App\Http\Controllers\patrocinadoresController@index')->name('site.patrocinadores');
    Route::prefix('/membros')->group(function(){
        Route::get('/direção', 'App\Http\Controllers\MembrosController@index')->name('site.membros');
        Route::get('/socios', 'App\Http\Controllers\MembrosController@index')->name('site.membros');
        Route::get('/fiscal', 'App\Http\Controllers\MembrosController@index')->name('site.membros');
        Route::get('/vogais', 'App\Http\Controllers\MembrosController@index')->name('site.membros');
        Route::get('/funcionarios', 'App\Http\Controllers\MembrosController@index')->name('site.membros');
    });
});

Route::prefix('/jogadores')->group(function(){
    Route::get('/seniores', 'App\Http\Controllers\EscalaoController@index')->name('site.jogadoresPage');
    Route::get('/juniores', 'App\Http\Controllers\EscalaoController@index')->name('site.jogadoresPage');
    Route::get('/EquipaTecnicaSeniores', 'App\Http\Controllers\equipaTecnicaController@index')->name('site.equipaTecnica');
    Route::get('/EquipaTecnicaJuniores', 'App\Http\Controllers\equipaTecnicaController@index')->name('site.equipaTecnica');
    Route::resource('jogador', 'App\Http\Controllers\EscalaoController');

});

Route::fallback(function(){
    return view('common.404');
});





