<div class="row">
    <div class="col-md-6">
        <div class="panel panel-grape">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 clearfix">
                        <h4 class="pull-left" style="margin:0 0 10px">Estatísticas de visitantes <small>(visão geral)</small></h4>
                        <div class="btn-group pull-right">
                            <a href="javascript:;" id="updatePieCharts" class="btn btn-default-alt btn-sm">Atualizar</a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-4" style="padding-top:10px;padding-bottom:10px;">
                        <div class="easypiechart" id="returningvisits" data-percent="65">
                            <span class="percent"></span>
                        </div>
                        <label for="newvisits">Retornando visitas</label>
                        <hr class="hidden-md hidden-lg">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-4" style="padding-top:10px;padding-bottom:10px;">
                        <span class="easypiechart" id="newvisitor" data-percent="81">
                            <span class="percent"></span>
                        </span>
                        <label for="bouncerate">Novo visitante</label>
                        <hr class="hidden-md hidden-lg">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-4" style="padding-top:10px;padding-bottom:10px;">
                        <span class="easypiechart" id="clickrate" data-percent="42">
                            <span class="percent"></span>
                        </span>
                        <label for="clickrate">Taxa de cliques</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="panel panel-orange">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 clearfix">
                        <h4 class="pull-left" style="margin: 0 0 20px;">Carregamento do servidor</h4>
                        <div class="btn-group pull-right">
                            <a href="javascript:;" class="btn btn-default btn-sm active">Servidor #1</a>
                            <a href="javascript:;" class="btn btn-default btn-sm ">Servidor #2</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="server-load" style="height:125px"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>