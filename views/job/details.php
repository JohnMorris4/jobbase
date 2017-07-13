<a class="success" href="/index.php?r=job">Back to Jobs</a>

<h2 class="page-header"><?php echo $job->title; ?> - 
    <small><?php echo $job->city; ?>, <?php echo $job->state; ?></small> </h2>

<?php if(!empty($job->description)) : ?>    
<div class="well">
    <h4>Job Description</h4>
    <?php echo $job->description; ?>
</div>

<?php endif; ?>

<ul class="list-group">


    
</ul>