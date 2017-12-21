@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <!-- Lista -->
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Produtos
                        <button id="orderBy" type="button" class="btn btn-primary btn-md pull-right" data-order="asc">
                            <span class="glyphicon glyphicon-arrow-up"></span>
                            &nbsp;&nbsp;&nbsp;
                            <span class="glyphicon glyphicon-arrow-down"></span>
                        </button>
                    </div>
                    <div class="panel-body">
                        <div class="list-group" id="catalog-list"></div>
                    </div>
                </div>
            </div>
            
            <!-- Filtro -->
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Filtro</div>
                    <div class="panel-body" id="specification-list"></div>
                    <div class="panel-footer">
                        <div class="form-group">
                            <form name="GET" action="">
                                <input class="btn btn-primary form-control pull-right" name="acao" type="submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
