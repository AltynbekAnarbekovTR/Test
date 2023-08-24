<?php include $this->resolve("partials/_header.php"); ?>

<!-- Start Main Content Area -->
<body>
<main>
  <div class="wrapper">
    <div class="container">
      <div class="main__article">
        <a
          href="https://www.positive.news/society/electric-van-summer-holidays-with-children/"
          class="card__image__link col--7 col--12--bp3"
        >
          <img
            src="https://www.positive.news/wp-content/uploads/2023/07/1-4-1320x880-c-center.jpg"
            class="card__image main__article--img img100"
            alt="Image for How an electric van changed our summer holidays forever"
          />
        </a>

        <div class="card__content col--5--last col--12--bp3">
          <a
            href="https://www.positive.news/society/electric-van-summer-holidays-with-children/"
            class="card__title h2"
            >How an electric van changed our summer holidays forever</a
          >
          <p>
            An electric Nissan has put a spark in summer holidays for one
            cash-strapped family, who share their tips for travelling by van
          </p>
          <a
            href="https://www.positive.news/category/environment/"
            class="card__category"
            >Environment</a
          >
          <a
            href="https://www.positive.news/category/lifestyle/"
            class="card__category"
            >Lifestyle</a
          >
          <a
            href="https://www.positive.news/category/society/"
            class="card__category"
            >Society</a
          >
          <a
            href="https://www.positive.news/category/lifestyle/travel/"
            class="card__category"
            >Travel</a
          >
        </div>
      </div>
      <div class="latest__articles cols--3--2--2">
        <div class="column card">
          <a
            href="https://www.positive.news/lifestyle/how-to-live-longer-eight-habits-that-could-add-years-to-your-life/"
            class="card__image__link"
          >
            <img
              src="./img/1200-×-800px-58-740x492-c-center.jpg"
              class="card__image main__article--img img100"
              alt="Image for How to live longer: eight habits that could add years to your life"
            />
          </a>

          <div class="card__content">
            <a
              href="https://www.positive.news/lifestyle/how-to-live-longer-eight-habits-that-could-add-years-to-your-life/"
              class="card__title h3"
              >How to live longer: eight habits that could add years to your
              life</a
            >
            <span class="card__text">
              These lifestyle habits could extend your life by decades,
              according to new research. Even doing a few could help
            </span>
            <a
              href="https://www.positive.news/category/lifestyle/body-mind/"
              class="card__category"
              >Body &amp; Mind</a
            >
            <a
              href="https://www.positive.news/category/lifestyle/health/"
              class="card__category"
              >Health</a
            >
            <a
              href="https://www.positive.news/category/lifestyle/"
              class="card__category"
              >Lifestyle</a
            >
            <a
              href="https://www.positive.news/category/lifestyle/wellbeing/"
              class="card__category"
              >Wellbeing</a
            >
          </div>
        </div>
        <?php foreach ($transactions as $transaction) : ?>
          <div class="column card">
          <a
            href="https://www.positive.news/lifestyle/how-to-live-longer-eight-habits-that-could-add-years-to-your-life/"
            class="card__image__link"
          >
            <img
              src="./img/1200-×-800px-58-740x492-c-center.jpg"
              class="card__image main__article--img img100"
              alt="Image for How to live longer: eight habits that could add years to your life"
            />
          </a>

          <div class="card__content">
            <a
              href="https://www.positive.news/lifestyle/how-to-live-longer-eight-habits-that-could-add-years-to-your-life/"
              class="card__title h3"
              ><?php echo e($transaction['description']); ?></a
            >
            <span class="card__text">
              These lifestyle habits could extend your life by decades,
              according to new research. Even doing a few could help
            </span>
            <a
              href="https://www.positive.news/category/lifestyle/body-mind/"
              class="card__category"
              >Body &amp; Mind</a
            >
            <a
              href="https://www.positive.news/category/lifestyle/health/"
              class="card__category"
              >Health</a
            >
            <a
              href="https://www.positive.news/category/lifestyle/"
              class="card__category"
              >Lifestyle</a
            >
            <a
              href="https://www.positive.news/category/lifestyle/wellbeing/"
              class="card__category"
              >Wellbeing</a
            >
          </div>
        </div>
          <?php endforeach; ?>
      </div>
    </div>
  </div>
</main>
    
  </body>
  <script
    src="https://kit.fontawesome.com/c1ac078dcd.js"
    crossorigin="anonymous"
  ></script>
<!-- End Main Content Area -->

<?php include $this->resolve("partials/_footer.php"); ?>