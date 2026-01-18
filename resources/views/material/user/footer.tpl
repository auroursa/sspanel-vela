<footer class="ui-footer">
    <div class="container">
        &copy;{$smarty.now|date_format:"%Y"} {$config['appName']} | Powered by <a href="/staff">SSPANEL</a>
        {if $config['enable_analytics_code'] === true}{include file='analytics.tpl'}{/if}
    </div>
</footer>

<!-- js -->
{if isset($geetest_html)}
    <script src="//static.geetest.com/static/tools/gt.js"></script>
{/if}
<script src="/theme/material/js/base.min.js"></script>
<script src="/theme/material/js/project.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script>console.table([['数据库查询', '执行时间'], ['{count($queryLog)} 次', '{$optTime} ms']])</script>

</body>
</html>
