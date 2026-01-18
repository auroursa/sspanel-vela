<?php

namespace App\Models;

use App\Models\Model;
use App\Models\Ann;
use App\Models\UserSubscribeLog;
use DateTime;

class Notify extends Model
{
    /**
     * 获取最新公告（返回 Ann 实例或 null）
     */
    public static function getLatestAnn()
    {
        return Ann::orderBy('date', 'desc')->first();
    }

    /**
     * 判断公告是否需要提醒
     * @param string|null $lastAnnDate 上次已读公告时间（格式 Y-m-d H:i:s）
     * @param int $thresholdDays 阈值天数
     * @return array|null 需要提醒时返回 ['date'=>..., 'content'=>...], 否则 null
     */
    public static function getAnnNotify($lastAnnDate, $thresholdDays)
    {
        if ($thresholdDays < 0) {
            return null;
        }
        $latest = self::getLatestAnn();
        if (!$latest) {
            return null;
        }
        $latestDate = $latest->date;
        $now = new DateTime();
        $annTime = new DateTime($latestDate);
        $diff = $now->diff($annTime)->days;
        if ($diff > $thresholdDays) {
            return null;
        }
        if ($lastAnnDate === $latestDate) {
            return null;
        }
        return [
            'date' => $latestDate,
            'content' => $latest->content,
        ];
    }

    /**
     * 获取用户最近一次订阅记录
     * @param int $userId
     * @return UserSubscribeLog|null
     */
    public static function getLatestSubLog($userId)
    {
        return UserSubscribeLog::where('user_id', $userId)->orderBy('request_time', 'desc')->first();
    }

    /**
     * 判断订阅记录是否需要提醒
     * @param int $userId
     * @param string|null $lastSubLogTime 上次已读订阅记录时间（格式 Y-m-d H:i:s）
     * @param int $thresholdDays 阈值天数
     * @return array|null 需要提醒时返回 ['last_time'=>..., 'days'=>...], 否则 null
     */
    public static function getSubLogNotify($userId, $lastSubLogTime, $thresholdDays)
    {
        if ($thresholdDays < 0) {
            return null;
        }
        $latest = self::getLatestSubLog($userId);
        if (!$latest) {
            return null;
        }
        $latestTime = $latest->request_time;
        $now = new DateTime();
        $subTime = new DateTime($latestTime);
        $days = $now->diff($subTime)->days;
        if ($days < $thresholdDays) {
            return null;
        }
        if ($lastSubLogTime === $latestTime) {
            return null;
        }
        return [
            'last_time' => $latestTime,
            'days' => $days,
        ];
    }
}
