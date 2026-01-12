<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\EmailSubscription> $subscriptions
 */
?>
<h1>Email Subscriptions</h1>
<p><?= count(iterator_to_array($subscriptions)) ?> total subscribers</p>

<?php $subscriptions->rewind(); ?>
<table class="admin-table">
    <thead>
        <tr>
            <th>Email</th>
            <th>Confirmed</th>
            <th>Subscribed</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($subscriptions as $subscription): ?>
        <tr>
            <td><?= h($subscription->email) ?></td>
            <td><?= $subscription->confirmed ? 'Yes' : 'No' ?></td>
            <td><?= $subscription->created->format('M j, Y g:i A') ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
