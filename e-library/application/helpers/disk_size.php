<?php
class disk_size
{
    public function getStorageSpace($drive)
    {
        //$formatBytes = $this->loadHelper("format_bytes");

        $ds = disk_total_space($drive);
        $df = disk_free_space($drive);
        $du = $ds - $df;
        $duP = round($du / $ds * 100, 1);

        $usedDiskSpace = $this->format($du);
        $totalDiskSpace = $this->format(disk_total_space($drive));
        $freeDiskSpace = $this->format(disk_free_space($drive));


        $data["freeDiskSpace"] = $freeDiskSpace;
        $data['totalDiskSpace'] = $totalDiskSpace;
        $data['usedDiskSpace'] = $usedDiskSpace;
        $data['usedDiskPercentage'] = $duP;

        return $data;

    }

    public function  format($bytes, $precision = 1) {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}