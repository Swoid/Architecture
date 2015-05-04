<?php use Core\Helpers\Html; ?>
<?php foreach($messages as $message): ?>
    <div class="row">
        <div class="pm <?= $message->author_id != $_SESSION['id'] ? 'friend-pm' : ''; ?>">
            <div class="header">
                <?php if($message->author_id != $_SESSION['id']): ?>
                    <?=  Html::img($message->avatar . '-m.png'); ?>
                <?php else: ?>
                    <?= Html::img($me->avatar . '-m.png'); ?>
                <?php endif; ?>
                <span class="time"><?= date('H:i', strtotime($message->date)); ?></span>
            </div>
            <p class="main">
               <?= $message->text; ?>
            </p>
        </div>
    </div>
<?php endforeach; ?>
