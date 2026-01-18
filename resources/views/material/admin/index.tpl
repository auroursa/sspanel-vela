{include file='admin/main.tpl'}

<main class="content">
    <div class="content-header ui-content-header">
        <div class="container">
            <h1 class="content-heading">汇总</h1>
        </div>
    </div>
    <div class="container">
        <section class="content-inner margin-top-no">
            <div class="row">
                <div class="col-xx-12">
                    <div class="card margin-bottom-no">
                        <div class="card-main">
                            <div class="card-inner">
                                <p>下面是系统运行情况简报。</p>
                                <p>
                                    付费用户：{$user->paidUserCount()}<br/>
                                    总共用户：{$user->count()}<br/>
                                    总转换率：{round($user->paidUserCount()/$user->count()*100,2)}%
                                </p>
                                <p>
                                    今日流水：￥{$user->calIncome("today")}<br/>
                                    昨日流水：￥{$user->calIncome("yesterday")}<br/>
                                    这月流水：￥{$user->calIncome("this month")}<br/>
                                    上月流水：￥{$user->calIncome("last month")}<br/>
                                    总共流水：￥{$user->calIncome("total")}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui-card-wrap">
                <div class="row">
                    <div class="col-xx-12 col-sm-6">
                        <div class="card">
                            <div class="card-main">
                                <div class="card-inner">
                                    <p>用户签到情况(总用户 {$sts->getTotalUser()}人)</p>
                                    <ul>
                                        <li>没有签到过的用户: {((1-($sts->getCheckinUser()/$sts->getTotalUser()))*100)|string_format:"%.2f"}% ({$sts->getTotalUser()-$sts->getCheckinUser()}人)</li>
                                        <li>曾经签到过的用户: {((($sts->getCheckinUser()-$sts->getTodayCheckinUser())/$sts->getTotalUser())*100)|string_format:"%.2f"}% ({$sts->getCheckinUser()-$sts->getTodayCheckinUser()}人)</li>
                                        <li>今日签到用户: {($sts->getTodayCheckinUser()/$sts->getTotalUser()*100)|string_format:"%.2f"}% ({$sts->getTodayCheckinUser()}人)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-main">
                                <div class="card-inner">
                                    <p>用户在线情况(总用户 {$sts->getTotalUser()}人)</p>
                                    <ul>
                                        <li>从未在线的用户: {((($sts->getUnusedUser()/$sts->getTotalUser()))*100)|string_format:"%.2f"}% {(($sts->getUnusedUser()))}人</li>
                                        <li>一天以前在线的用户: {((($sts->getTotalUser()-$sts->getOnlineUser(86400)-$sts->getUnusedUser())/$sts->getTotalUser())*100)|string_format:"%.2f"}% {($sts->getTotalUser()-$sts->getOnlineUser(86400)-$sts->getUnusedUser())}人</li>
                                        <li>一天内在线的用户: {(($sts->getOnlineUser(86400)-$sts->getOnlineUser(3600))/$sts->getTotalUser()*100)|string_format:"%.2f"}% {($sts->getOnlineUser(86400)-$sts->getOnlineUser(3600))}人</li>
                                        <li>一小时内在线的用户: {(($sts->getOnlineUser(3600)-$sts->getOnlineUser(60))/$sts->getTotalUser()*100)|string_format:"%.2f"}% {($sts->getOnlineUser(3600)-$sts->getOnlineUser(60))}人</li>
                                        <li>一分钟内在线的用户: {(($sts->getOnlineUser(60))/$sts->getTotalUser()*100)|string_format:"%.2f"}% {($sts->getOnlineUser(60))}人</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xx-12 col-sm-6">
                        <div class="card">
                            <div class="card-main">
                                <div class="card-inner">
                                    <p>节点在线情况(节点数 {$sts->getTotalNodes()}个)</p>
                                    <ul>
                                        {if $sts->getTotalNodes()!=0}
                                        <li>离线节点: {((1-($sts->getAliveNodes()/$sts->getTotalNodes()))*100)|string_format:"%.2f"}% ({$sts->getTotalNodes()-$sts->getAliveNodes()}个)</li>
                                        <li>在线节点: {((($sts->getAliveNodes()/$sts->getTotalNodes()))*100)|string_format:"%.2f"}% ({$sts->getAliveNodes()}个)</li>
                                        {/if}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-main">
                                <div class="card-inner">
                                    <p>流量使用情况(总分配流量 {$sts->getTotalTraffic()})</p>
                                    <ul>
                                        {if $sts->getRawTotalTraffic()!=0}
                                        <li>总剩余可用: {((($sts->getRawUnusedTrafficUsage()/$sts->getRawTotalTraffic()))*100)|string_format:"%.2f"}% ({($sts->getUnusedTrafficUsage())})</li>
                                        <li>总过去已用: {((($sts->getRawLastTrafficUsage()/$sts->getRawTotalTraffic()))*100)|string_format:"%.2f"}% ({($sts->getLastTrafficUsage())})</li>
                                        <li>总今日已用: {((($sts->getRawTodayTrafficUsage()/$sts->getRawTotalTraffic()))*100)|string_format:"%.2f"}% ({($sts->getTodayTrafficUsage())})</li>
                                        {/if}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

{include file='admin/footer.tpl'}
