<footer class="ui-footer">
    <div class="container">
        &copy;{$smarty.now|date_format:"%Y"} {$config['appName']} | Powered by <a href="/staff">SSPANEL</a>
        {if $config['enable_analytics_code'] === true}{include file='analytics.tpl'}{/if}
    </div>
</footer>

<!-- js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/dataTables.material.min.js"></script>
<script src="/theme/material/js/base.min.js"></script>
<script src="/theme/material/js/project.min.js"></script>
</body>
</html>
