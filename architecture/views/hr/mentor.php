<?php

?>
<div>

</div>

<div>
    <div>
        <table class="city_list">
            <?php foreach ($mentors as $item): ?>
                <tr>
                    <?php foreach ($item as $row): ?>
                        <td><?php echo $row; ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<div>
'

    '
</div>

<div>
    <div>
        <?php if (count($students) != 0): ?>
        <table class="city_list">
            <?php foreach ($students as $item): ?>
                <tr>
                    <?php foreach ($item as $row): ?>
                        <td><?php echo $row; ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php endif ?>
    </div>

</div>
<div>
    '

    '
</div>
<div>

    <div>
        <table class="city_list">
            <?php foreach ($allstudents as $student): ?>
                <tr>
                    <?php foreach ($student as $row): ?>
                        <td><?php echo $row; ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
