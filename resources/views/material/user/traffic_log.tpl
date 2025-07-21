{include file='user/main.tpl'}

<main class="content">
    <div class="content-header ui-content-header">
        <div class="container">
            <h1 class="content-heading">流量图表</h1>
        </div>
    </div>
    <div class="container">
        <section class="content-inner margin-top-no">
            <div class="ui-card-wrap">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-main">
                                <div class="card-inner">
                                    <p>此处实际流量与您运营商计算方式不同，可能会略微小于运营商的计费流量，仅供参考。</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-main">
                                <div class="card-inner">
                                    <div id="log_chart" style="height: 300px; width: 100%;"></div>
                                    <script src="/assets/js/canvasjs.min.js"></script>
                                    <script type="text/javascript">
                                        window.onload = function () {
                                            var log_chart = new CanvasJS.Chart("log_chart",
                                                    {
                                                        zoomEnabled: true,
                                                        title: {
                                                            text: "最近30小时流量消耗",
                                                            fontSize: 20

                                                        },
                                                        animationEnabled: true,
                                                        axisX: {
                                                            title: "时间/分钟",
                                                            labelFontSize: 14,
                                                            titleFontSize: 18
                                                        },
                                                        axisY: {
                                                            title: "实际流量/KB",
                                                            lineThickness: 2,
                                                            labelFontSize: 14,
                                                            titleFontSize: 18
                                                        },
                                                        data: [
                                                            {
                                                                type: "scatter",
                                                                {literal}
                                                                toolTipContent: "<span style=color: {color};><strong>产生时间: </strong></span>{x} <br/><span style=color: {color};><strong>计费流量: </strong></span>{traffic} <br/><span style=color: {color};><strong>实际上传: </strong></span>{upload} <br/><span style=color: {color};><strong>实际下载: </strong></span>{download} <br/><span style=color: {color};><strong>产生节点: </strong></span>{jd}",
                                                                {/literal}
                                                                dataPoints: [
                                                                    {$i=0}
                                                                    {foreach $logs as $single_log}
                                                                    {if $i==0}
                                                                    {literal}
                                                                    {
                                                                        {/literal}
                                                                        x: new Date({$single_log->log_time*1000}),
                                                                        y: {$single_log->totalUsedRaw()},
                                                                        jd: "{$single_log->node()->name}",
                                                                        traffic: "{$single_log->traffic}",
                                                                        color : "{$single_log->nodeColor()}",
                                                                        download : "{$single_log->downloadtraffic()}",
                                                                        upload : "{$single_log->uploadtraffic()}"
                                                                        {literal}
                                                                    }
                                                                    {/literal}
                                                                    {$i=1}
                                                                    {else}
                                                                    {literal}
                                                                    , {
                                                                        {/literal}
                                                                        x: new Date({$single_log->log_time*1000}),
                                                                        y: {$single_log->totalUsedRaw()},
                                                                        jd: "{$single_log->node()->name}",
                                                                        traffic: "{$single_log->traffic}",
                                                                        color : "{$single_log->nodeColor()}",
                                                                        download : "{$single_log->downloadtraffic()}",
                                                                        upload : "{$single_log->uploadtraffic()}"
                                                                        {literal}
                                                                    }
                                                                    {/literal}
                                                                    {/if}
                                                                    {/foreach}
                                                                ]
                                                            }
                                                        ]
                                                    });
                                            log_chart.render();
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

{include file='user/footer.tpl'}
