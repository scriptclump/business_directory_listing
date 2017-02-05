<div class="inner_content">
	<div class="bread_crumb">
		<?php
			$this->Html->addCrumb('Home', '/');
			$this->Html->addCrumb('Categories', '/categories');
			echo $this->Html->getCrumbList();
		?>
	</div>
	<h1>Categories</h1>
	<?php
	if (!empty($listing_types)):
	?>
			<?php foreach ($listing_types as $k => $v):  ?>
				<h2><?=$v['ListingType']['title']?></h2>
					<ul class="list_three_col">
						<?php foreach ($v['Category'] as $key => $value) : ?>
							<li><a href="<?=BASE_URL.'category/'.$value['slug']?>"><?=$value['title']?></a></li>
						<?php endforeach; ?>
					</ul>
			<?php endforeach; ?>
	<?php
	else:
		echo "No category found";
	endif;
	?>
</div>