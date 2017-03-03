
          <div class="col-sm-9 col-lg-10">
            <!-- your page content -->
            <?php echo $this->session->flashdata("save_tamu"); ?>
        	
        	<h4 class="text-right">
				<ol class="breadcrumb">
  					<li class="breadcrumb-item"><a href="#">Home</a></li>
  					<li class="breadcrumb-item">daftar tamu</li>
				</ol>        	
			</h4>

            <?php if(!empty($tamu)): ?>
			<table class="table table-bordered table-hover table-striped">
			<tr>
			<th width="10">No</th>
			<th width="10">Kode</th>
			<th width="20">Nama</th>
			<th width="20">Email</th>
			<th width="20">No. Telpon</th>
			<th width="20">Alamat</th>
			<th width="10">Aksi</th>
			</tr>
			<?php $no = 1; foreach ($tamu as $item): ?>
			<tr>
			<td class="text-center"><?php echo $no;  ?>.</td>
			<td><?php echo $item->kode;  ?></td>
			<td><?php echo $item->nama;  ?></td>
			<td><?php echo $item->email;  ?></td>
			<td><?php echo $item->telp;  ?></td>
			<td><?php echo $item->alamat;  ?></td>
			<td>	
			<a href="<?php echo site_url('home/edit/'.$item->id); ?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>
			<a href="<?php echo site_url('home/delete/'.$item->id); ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
			<a href="<?php echo site_url('home/send_mail/'.$item->email); ?>" data-toggle="tooltip" data-placement="top" title="Kirim ke email saya"><i class="fa fa-envelope"></i></a> 
			</td>
			</tr>
			<?php $no++; endforeach; ?>
				</table>
			<?php /* echo $this->pagination->create_links(); */ ?>
			<?php else: ?>
			<div class="alert alert-warning">
				<p>Data not found</p>
			</div>
			<?php endif; ?>

          </div>
      	</div>

    <script>
		$(document).ready(function(){
    	$('[data-toggle="tooltip"]').tooltip(); 
		});
	</script>  	
  
