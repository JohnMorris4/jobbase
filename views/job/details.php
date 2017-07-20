<a class="success" href="/index.php?r=job">Back to Jobs</a>

<h2 class="page-header"><?php echo $job->title; ?> - 
    <small><?php echo $job->city; ?>, <?php echo $job->state; ?></small>
    <span class="pull-right">
        <a href="index.php?r=job/edit&id=<?php echo $job->id; ?>" class="btn btn-success">Edit Job</a>
        <a href="index.php?r=job/delete&id=<?php echo $job->id; ?>" class="btn btn-danger">Delete Job</a>
    </span> </h2>

<?php if(!empty($job->description)) : ?>    
<div class="well">
    <h4>Job Description</h4>
    <?php echo $job->description; ?>
</div>

<?php endif; ?>

<ul class="list-group">
<?php if(!empty($job->create_date)) : ?>
    <?php $phpdate = strtotime($job->create_date); ?>
    <?php $formatted_date = date("F j, Y, g:i a", $phpdate); ?>
    <li class="list-group-item"><strong>Listing Date: </strong><?php echo $job->create_date; ?>   </li>
<?php endif; ?>

<?php if(!empty($job->catagory->name)) : ?>
    <li class="list-group-item"><strong>Category: </strong><?php echo $job->catagory->name; ?>   </li>
<?php endif; ?>

<?php if(!empty($job->type)) : ?>
		<li class="list-group-item"><strong>Employment Type:</strong> <?php echo ucwords(str_replace('_', ' ', $job->type)); ?></li>
	<?php endif; ?>

	<?php if(!empty($job->salary_range)) : ?>
		<li class="list-group-item"><strong>Salary Range:</strong> <?php echo $job->salary_range; ?></li>
	<?php endif; ?>

	<?php if(!empty($job->contact_email)) : ?>
		<li class="list-group-item"><strong>Contact Email:</strong> <?php echo $job->contact_email; ?></li>
	<?php endif; ?>

	<?php if(!empty($job->contact_phone)) : ?>
		<li class="list-group-item"><strong>Contact Phone:</strong> <?php echo $job->contact_phone; ?></li>
	<?php endif; ?>
</ul>

<a class="btn btn-primary" href="mailto:<?php echo $job->contact_email; ?>?Subject=Job%20Application">Contact Employer</a>
