    <div class="row">
      <div class="col-md-6 mx-auto ">
        <div class="card  cards-novo">
          <div class="card-body">
            <form class="text-center" style="color: #757575;" action="<?php echo base_url('admin/editnewss'); ?>" method="POST">
              <h3 class="font-weight-bold my-4 pb-2 text-center ">{news}</h3>
                <input type="hidden" name="id" value="<?php echo $news_id; ?>">
              <input type="text" class="form-control mb-4" placeholder="{title}" value="<?php echo $news_title_value; ?>" name="title">
              <input type="text"class="form-control" placeholder="{description}" value="<?php echo $news_description_value; ?>" name="descrip">
              <br>
              <textarea id="tiny" name="txt" placeholder="{textnews}"><?php echo $news_text_value; ?></textarea>
              <div class="text-center">
                <button type="submit" class="btn btn-outline-orange btn-rounded my-4 waves-effect">{edit}</button>
                <a href="<?php echo base_url('admin/news'); ?>" type="button" class="btn btn-outline-blue btn-rounded my-4 waves-effect">{return}</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>



