{$load=$point_node->getNodeLoad()}

<div class="ui-card-wrap">
    <div class="row">
        <!-- Loadavg 部分 -->
        <div class="col-xx-12 col-sm-6">
            <div class="card">
                <div class="card-main">
                    <div class="card-inner">
                        <p>Loadavg {$prefix}</p>
                        <ul>
                            {foreach $load as $single_load}
                                <li>时间: {$single_load->log_time|date_format:"%Y-%m-%d %H:%M:%S"},
                                    Load: {$single_load->getNodeLoad()}</li>
                            {/foreach}
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- 节点在线情况部分 -->
        <div class="col-xx-12 col-sm-6">
            <div class="card">
                <div class="card-main">
                    <div class="card-inner">
                        <p>最近一天节点在线情况 {$prefix} - 在线 {$point_node->getNodeUptime()}</p>
                        <ul>
                            <li>在线率: {($point_node->getNodeUpRate()*100)|string_format:"%.2f"}%</li>
                            <li>离线率: {((1-$point_node->getNodeUpRate())*100)|string_format:"%.2f"}%</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- 节点在线人数情况部分 -->
        <div class="col-xx-12 col-sm-6">
            <div class="card">
                <div class="card-main">
                    <div class="card-inner">
                        <p>最近一天节点在线人数情况 {$prefix}</p>
                        <ul>
                            {foreach $load as $single_load}
                                <li>时间: {$single_load->log_time|date_format:"%Y-%m-%d %H:%M:%S"},
                                    在线人数: {$single_load->online_user}</li>
                            {/foreach}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
