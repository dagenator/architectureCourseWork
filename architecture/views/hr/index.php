<?php
use yii\helpers\Url;
?>

<div>

    <div>
        <table class="city_list">
            <?php foreach ($mentors as $mentor): ?>
                <tr>
                    <?php foreach ($mentor as $row): ?>
                        <td><?php echo $row; ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

</div>
