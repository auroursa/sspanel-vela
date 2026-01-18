{* notify.tpl 模块：公告和订阅记录提醒 *}
{* 公告提醒 *}
{if $notifyAnn}
<div aria-hidden="true" class="modal fade" id="notify-ann-modal" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-xs modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-heading">
        <a class="modal-close" data-dismiss="modal">×</a>
        <h2 class="modal-title">站点公告更新提醒</h2>
      </div>
      <div class="modal-inner">
        <p>最近有新的公告发布（{$notifyAnn.date}），请及时查看！</p>
        <div class="checkbox switch" style="margin-top:20px;">
          <label for="ann_no_tip_switch">
            <input class="access-hide" id="ann_no_tip_switch" type="checkbox">
            <span class="switch-toggle"></span>本次会话不再提示
          </label>
        </div>
        <a href="/user/announcement" class="btn btn-flat btn-brand waves-attach" style="margin-top:16px;">查看公告</a>
      </div>
      <div class="modal-footer">
        <p class="text-right" style="margin-bottom:0;">
          <button class="btn btn-flat btn-brand waves-attach" data-dismiss="modal" 
              type="button">确定
          </button>
        </p>
        </br>
      </div>
    </div>
  </div>
</div>
{/if}

{* 订阅记录提醒 *}
{if $notifySubLog}
<div aria-hidden="true" class="modal fade" id="notify-sublog-modal" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-xs modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-heading">
        <a class="modal-close" data-dismiss="modal">×</a>
        <h2 class="modal-title">订阅记录未更新提醒</h2>
      </div>
      <div class="modal-inner">
        <p>您的订阅记录已连续 {$notifySubLog.days} 天未更新，可能导致无法正常使用，请检查订阅客户端！</p>
        <div class="checkbox switch" style="margin-top:20px;">
          <label for="sublog_no_tip_switch">
            <input class="access-hide" id="sublog_no_tip_switch" type="checkbox">
            <span class="switch-toggle"></span>本次会话不再提示
          </label>
        </div>
      </div>
      <div class="modal-footer">
        <p class="text-right" style="margin-bottom:0;">
          <button class="btn btn-flat btn-brand waves-attach" data-dismiss="modal" 
              type="button">确定
          </button>
        </p>
        </br>
      </div>
    </div>
  </div>
</div>
{/if}

<script>
function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}



document.addEventListener('DOMContentLoaded', function() {
  // 订阅记录提醒函数 - 定义在外部，确保始终存在
  var showSubLogNotification = function() {
    {if $notifySubLog}
    if(getCookie('noSubLogTip') != '{$notifySubLog.last_time}') {
      $("#notify-sublog-modal").modal({ldelim}backdrop: true, keyboard: true{rdelim});
    }
    {/if}
  };
  
  // 公告提醒 - 优先级更高
  {if $notifyAnn}
  var showAnnNotification = function() {
    if(getCookie('noAnnTip') != '{$notifyAnn.date}') {
      var annModal = $("#notify-ann-modal");
      annModal.modal({ldelim}backdrop: true, keyboard: true{rdelim});
      
      // 监听公告对话框关闭事件，关闭后再显示订阅通知
      annModal.on('hidden.bs.modal', function() {
        showSubLogNotification();
      });
    } else {
      // 如果公告通知被跳过，直接显示订阅通知
      showSubLogNotification();
    }
  };
  
  var annSwitch = document.getElementById('ann_no_tip_switch');
  if (annSwitch) {
    annSwitch.checked = false;
    annSwitch.addEventListener('change', function() {
      if (this.checked) {
        setCookie('noAnnTip', '{$notifyAnn.date}', 7);
      } else {
        setCookie('noAnnTip', '', -1);
      }
    });
  }
  
  showAnnNotification();
  {else}
  // 如果没有公告提醒，直接显示订阅通知
  showSubLogNotification();
  {/if}
  
  {if $notifySubLog}
  // 订阅记录提醒事件监听
  var sublogSwitch = document.getElementById('sublog_no_tip_switch');
  if (sublogSwitch) {
    sublogSwitch.checked = false;
    sublogSwitch.addEventListener('change', function() {
      if (this.checked) {
        setCookie('noSubLogTip', '{$notifySubLog.last_time}', 7);
      } else {
        setCookie('noSubLogTip', '', -1);
      }
    });
  }
  {/if}
});
</script>

<style>
.modal.fade.show .modal-dialog-centered {
  display: flex !important;
  align-items: center !important;
}

.modal.fade .modal-dialog-centered {
  margin-top: 0 !important;
}

#notify-ann-modal .modal-dialog,
#notify-sublog-modal .modal-dialog {
  margin: auto !important;
}
</style>