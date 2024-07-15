<?php
$query = "SELECT COUNT(*) AS total_Predemptions FROM tbl_request";
$result = $conn->query($query);
if ($result) {
    $row = $result->fetch_assoc();
    $total_Predemptions = $row['total_Predemptions'];
} else {
    $total_Predemptions = 0;
}
?>
<div class="stats shadow rounded-md bg-[#F2FFFC]">
    <div class="stat p-2">
        <div class="stat-figure text-[#46E84B]">
            <i data-lucide="layout-list"></i>
        </div>
        <div class="stat-title text-[12px]">Pending Redemptions</div>
        <div class="divide-y divide-[#46E84B]">
            <div class="font-bold text-md"><?php echo $total_Predemptions ?></div>
            <div class="flex flex-row items-center gap-1">
                <div class="stat-desc text-[10px]">View Pendings</div><i data-lucide="eye" class="w-3 h-3"></i>
            </div>
        </div>
    </div>
</div>