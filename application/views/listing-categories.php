<?php

require('header.php');

?>

<section class="banner">
	<div class="container p-6">
		<div class="row min-vh-10">
			<div class="col-lg-12 text-center">
				<h1>Ben'sList Classified</h1>
				<p class="banner-text pb-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s </p>
			</div>

			<div class="row">
				<form class="w-75 mx-auto col-lg-9">
					<div class="input-group ss-form ">
						<select class="col-4 form-control banner-round-select mb-2">
							<option>Any Category</option>
							<option>Category</option>
						</select>

						<select class="col-4 form-control mb-2">
							<option>Any Category</option>
							<option>Category</option>
						</select>

						<input type="text" class="col-4 form-control banner-round-input">
						<button class="nav-btn banner-btn">Search Now</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!--listing-categories -->
<section class="listing-categories">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-3 mt-5 mb-5">
                    <div class="col-lg-12 col-xs-12">
                        <h4 class="mt-0 "> Used Cars</h4>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <div class="card">
                                <article class="card-group-item">
                                    <header class="card-header"><h5 class="title">All Categories </h5></header>
                                    <div class="filter-content">
                                        <div class="list-group list-group-flush">
                                          <a href="#" class="list-group-item font-weight-bold"><h4 class="d-inline-block">Cras</h4> <span>(292909)</span> </a>
                                          <a href="#" class="list-group-item">Commercial Vehicles<span>(47059)</span>  </a>
                                          <a href="#" class="list-group-item">Spare Parts<span>(29211)</span>  </a>
                                          <a href="#" class="list-group-item">Other Vehicles<span>(13536)</span>  </a>
                                        </div>  <!-- list-group .// -->
                                    </div>
                                </article> <!-- card-group-item.// -->
                                  <!-- card-group-item.// -->
                        </div> <!-- card.// -->
                    </div>
                    <div class="col-lg-12">
                        <h4>Brands & Modals</h4>

                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <select class="mdb-select md-form colorful-select dropdown-primary brands-design">
                              <option value="1">Mahindra</option>
                              <option value="2">Maruti Suzuki</option>
                              <option value="3">Hyundai</option>
                              <option value="4">Tata</option>
                              <option value="5">Toyota</option>
                               <option value="5">Toyota</option>
                                <option value="5">Toyota</option>
                                 <option value="5">Toyota</option>
                        </select>
                    </div>

                    <div class="col-lg-12">
                        <h4>Price</h4>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <div class="price-input">
                            <input name="price|min" type="number" data-aut-id="filterTextbox" placeholder="Min" min="0" max="9223372036854776000" class="range-input-min" value="">
                            <input name="price|max" type="number" data-aut-id="filterTextbox" placeholder="Max" min="0" max="9223372036854776000" class="range-input-max" value="">

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <h4>Year</h4>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                         <input name="price|min" type="number" data-aut-id="filterTextbox" placeholder="Min" min="0" max="9223372036854776000" class="range-input-min" value="">
                            <input name="price|max" type="number" data-aut-id="filterTextbox" placeholder="Max" min="0" max="9223372036854776000" class="range-input-max" value="">
                    </div>
                    <div class="col-lg-12">
                        <h4>Fuel</h4>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <div class="fule d-flex">
                            <input type="checkbox" name="diesel" value="false" class="" >
                            <label class="font-weight-light mt-2">Disel (15721)</label>
                        </div>
                        <div class="fule d-flex">
                            <input type="checkbox" name="diesel" value="false" class="" >
                            <label class="font-weight-light mt-2">Petrol(116634)</label>
                        </div>
                        <div class="fule d-flex">
                            <input type="checkbox" name="diesel" value="false" class="" >
                            <label class="font-weight-light mt-2">CNG & Hybrids(19161)</label>
                        </div>
                        <div class="fule d-flex">
                            <input type="checkbox" name="diesel" value="false" class="" >
                            <label class="font-weight-light mt-2"> LPG(3829)</label>
                        </div>

                    </div>
                    <div class="col-lg-12">
                        <h4>KM Driven</h4>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                         <input name="price|min" type="number" data-aut-id="filterTextbox" placeholder="Min" min="0" max="9223372036854776000" class="range-input-min" value="">
                            <input name="price|max" type="number" data-aut-id="filterTextbox" placeholder="Max" min="0" max="9223372036854776000" class="range-input-max" value="">
                    </div>

                </div>
                <div class="col-lg-9 mt-5 mb-5 p-0">
                    <div class="col-lg-4 col-sm-6 col-md-6 p-0">
                        <div class="col-lg-12">
                            <div class="card rounded">
                                <div class="card-image">

                                <img class="img-fluid" src="http://nextinfosoft.com/benslist/assets/images/category/z.jpeg">
                                </div>
                                    <div class="card-image-overlay m-auto">
                                        <h4 class="card-detail-badge text-dark text-left font-weight-bold mb-0">Toyota Fortuner 3.0 Ltd – 2012 </h4>

                                        <span class="card-detail-badge d-inline-block text-secondary">13000 Kms</span>
                                        <span class="card-detail-badge d-inline-block text-secondary text-right">Diesel</span>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="ad-title m-auto">
                                            <h5 class="text-left text-secondary font-weight-bold m-0">14,00,000</h>
                                        </div>
                                    </div>
                                    <div class="card-body pr-0 pl-0">
                                         <div class="card-border"></div>

                                         <a class="ad-btn" href="#">View</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-md-6 p-0 ">
                        <div class="col-lg-12">
                            <div class="card rounded">
                                <div class="card-image">

                                <img class="img-fluid" src="http://nextinfosoft.com/benslist/assets/images/category/z.jpeg">
                                </div>
                                    <div class="card-image-overlay m-auto">
                                        <h4 class="card-detail-badge text-dark text-left font-weight-bold mb-0">Mahindra Xuv500 XUV500 W8, </h4>

                                        <span class="card-detail-badge d-inline-block text-secondary"> 35,000 km</span>
                                        <span class="card-detail-badge d-inline-block text-secondary text-right">Diesel</span>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="ad-title m-auto">
                                            <h5 class="text-left text-secondary font-weight-bold m-0">14,00,000</h>
                                        </div>
                                    </div>
                                    <div class="card-body pr-0 pl-0">
                                         <div class="card-border"></div>

                                         <a class="ad-btn" href="#">View</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-md-6 p-0">
                        <div class="col-lg-12">
                            <div class="card rounded">
                                <div class="card-image">

                                <img class="img-fluid" src="http://nextinfosoft.com/benslist/assets/images/category/z.jpeg">
                                </div>
                                    <div class="card-image-overlay m-auto">
                                        <h4 class="card-detail-badge text-dark text-left font-weight-bold mb-0">Toyota Fortuner 3.0 Ltd – 2012 </h4>

                                        <span class="card-detail-badge d-inline-block text-secondary">13000 Kms</span>
                                        <span class="card-detail-badge d-inline-block text-secondary text-right">Diesel</span>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="ad-title m-auto">
                                            <h5 class="text-left text-secondary font-weight-bold m-0">14,00,000</h>
                                        </div>
                                    </div>
                                    <div class="card-body pr-0 pl-0">
                                         <div class="card-border"></div>

                                         <a class="ad-btn" href="#">View</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-md-6 mt-4 p-0">
                        <div class="col-lg-12">
                            <div class="card rounded">
                                <div class="card-image">

                                <img class="img-fluid" src="http://nextinfosoft.com/benslist/assets/images/category/z.jpeg">
                                </div>
                                    <div class="card-image-overlay m-auto">
                                        <h4 class="card-detail-badge text-dark text-left font-weight-bold mb-0">Toyota Fortuner 3.0 Ltd – 2012 </h4>

                                        <span class="card-detail-badge d-inline-block text-secondary">13000 Kms</span>
                                        <span class="card-detail-badge d-inline-block text-secondary text-right">Diesel</span>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="ad-title m-auto">
                                            <h5 class="text-left text-secondary font-weight-bold m-0">14,00,000</h>
                                        </div>
                                    </div>
                                    <div class="card-body pr-0 pl-0">
                                         <div class="card-border"></div>

                                         <a class="ad-btn" href="#">View</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-md-6 mt-4 p-0">
                        <div class="col-lg-12">
                            <div class="card rounded">
                                <div class="card-image">

                                <img class="img-fluid" src="http://nextinfosoft.com/benslist/assets/images/category/z.jpeg">
                                </div>
                                    <div class="card-image-overlay m-auto">
                                        <h4 class="card-detail-badge text-dark text-left font-weight-bold mb-0">Toyota Fortuner 3.0 Ltd – 2012 </h4>

                                        <span class="card-detail-badge d-inline-block text-secondary">13000 Kms</span>
                                        <span class="card-detail-badge d-inline-block text-secondary text-right">Diesel</span>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="ad-title m-auto">
                                            <h5 class="text-left text-secondary font-weight-bold m-0">14,00,000</h>
                                        </div>
                                    </div>
                                    <div class="card-body pr-0 pl-0">
                                         <div class="card-border"></div>

                                         <a class="ad-btn" href="#">View</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-md-6 mt-4 p-0">
                        <div class="col-lg-12">
                            <div class="card rounded">
                                <div class="card-image">

                                <img class="img-fluid" src="http://nextinfosoft.com/benslist/assets/images/category/z.jpeg">
                                </div>
                                    <div class="card-image-overlay m-auto">
                                        <h4 class="card-detail-badge text-dark text-left font-weight-bold mb-0">Toyota Fortuner 3.0 Ltd – 2012 </h4>

                                        <span class="card-detail-badge d-inline-block text-secondary">13000 Kms</span>
                                        <span class="card-detail-badge d-inline-block text-secondary text-right">Diesel</span>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="ad-title m-auto">
                                            <h5 class="text-left text-secondary font-weight-bold m-0">14,00,000</h>
                                        </div>
                                    </div>
                                    <div class="card-body pr-0 pl-0">
                                         <div class="card-border"></div>

                                         <a class="ad-btn" href="#">View</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-md-6 mt-4 p-0">
                        <div class="col-lg-12">
                            <div class="card rounded">
                                <div class="card-image">

                                <img class="img-fluid" src="http://nextinfosoft.com/benslist/assets/images/category/z.jpeg">
                                </div>
                                    <div class="card-image-overlay m-auto">
                                        <h4 class="card-detail-badge text-dark text-left font-weight-bold mb-0">Toyota Fortuner 3.0 Ltd – 2012 </h4>

                                        <span class="card-detail-badge d-inline-block text-secondary">13000 Kms</span>
                                        <span class="card-detail-badge d-inline-block text-secondary text-right">Diesel</span>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="ad-title m-auto">
                                            <h5 class="text-left text-secondary font-weight-bold m-0">14,00,000</h>
                                        </div>
                                    </div>
                                    <div class="card-body pr-0 pl-0">
                                         <div class="card-border"></div>

                                         <a class="ad-btn" href="#">View</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-md-6 mt-4 p-0">
                        <div class="col-lg-12">
                            <div class="card rounded">
                                <div class="card-image">

                                <img class="img-fluid" src="http://nextinfosoft.com/benslist/assets/images/category/z.jpeg">
                                </div>
                                    <div class="card-image-overlay m-auto">
                                        <h4 class="card-detail-badge text-dark text-left font-weight-bold mb-0">Toyota Fortuner 3.0 Ltd – 2012 </h4>

                                        <span class="card-detail-badge d-inline-block text-secondary">13000 Kms</span>
                                        <span class="card-detail-badge d-inline-block text-secondary text-right">Diesel</span>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="ad-title m-auto">
                                            <h5 class="text-left text-secondary font-weight-bold m-0">14,00,000</h>
                                        </div>
                                    </div>
                                    <div class="card-body pr-0 pl-0">
                                         <div class="card-border"></div>

                                         <a class="ad-btn" href="#">View</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-md-6 mt-4 p-0">
                        <div class="col-lg-12">
                            <div class="card rounded">
                                <div class="card-image">

                                <img class="img-fluid" src="http://nextinfosoft.com/benslist/assets/images/category/z.jpeg">
                                </div>
                                    <div class="card-image-overlay m-auto">
                                        <h4 class="card-detail-badge text-dark text-left font-weight-bold mb-0">Toyota Fortuner 3.0 Ltd – 2012 </h4>

                                        <span class="card-detail-badge d-inline-block text-secondary">13000 Kms</span>
                                        <span class="card-detail-badge d-inline-block text-secondary text-right">Diesel</span>
                                    </div>
                                    <div class="card-body text-center">
                                        <div class="ad-title m-auto">
                                            <h5 class="text-left text-secondary font-weight-bold m-0">14,00,000</h>
                                        </div>
                                    </div>
                                    <div class="card-body pr-0 pl-0">
                                         <div class="card-border"></div>

                                         <a class="ad-btn" href="#">View</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>










            </div>
        </div>
    </div>
</section>










<?php require('footer.php'); ?>

<style>

.list-hover:hover{
    background: #ff7cc1 !important;
    color: #fff !important;
    border-color: #ee0880 !important;
}

#ads {
    margin: 30px 0 30px 0;

}
.listing-categories span.card-detail-badge{
    font-size: 14px;
    padding: 0 10px;
}
.listing-categories .card-notify-badge {
        position: absolute;
        left: -10px;
        top: -20px;
         text-align: center;
        border-radius: 30px 30px 30px 30px;
        color: #000;
        padding: 5px 10px;



    }

.listing-categories .card-notify-year {
        position: absolute;
        right: -10px;
        top: -20px;
        background: #ff4444;
        border-radius: 50%;
        text-align: center;
        color: #fff;
        font-size: 14px;
        width: 50px;
        height: 50px;
        padding: 15px 0 0 0;
}


.listing-categories  .card-detail-badge {

        padding: 5px 10px;

    }



  .listing-categories .card:hover {
            background: #fff;
            box-shadow: 12px 15px 20px 0px rgba(46,61,73,0.15);
            border-radius: 4px;
            transition: all 0.3s ease;
        }

  .listing-categories .card-image-overlay {
        font-size: 20px;

    }

  .listing-categories .card-image-overlay span {
            display: inline-block;
        }

.listing-categories  .ad-btn {
        text-transform: uppercase;
        width: 50%;
        height: 40px;
        border-radius: 30px;
        font-size: 16px;
        line-height: 35px;
        text-align: center;
        border: 3px solid #ee0880;
        display: block;
        text-decoration: none;
        margin: 20px auto 1px auto;
        color: #fff;
        overflow: hidden;
        position: relative;
        background-color: #ee0880;
    }
.listing-categories  .ad-btn:hover {
            background-color: #ee0880;
            color: #1e1717;
            border: 2px solid #ee0880;
            background: transparent;
            transition: all 0.3s ease;
            box-shadow: 12px 15px 20px 0px rgba(46,61,73,0.15);
            text-decoration: none;
        }

   .listing-categories .ad-title h5 {
        text-transform: uppercase;
        font-size: 18px;
    }
  .listing-categories  .card-border{
        border: 1px solid#ccc;
    }

.brands-design{
    background: none;
    border: none;
    color: #002f34;
    display: block;
    font-size: 16px;
    height: 48px;
    box-sizing: border-box;
    outline: none;
    /* padding-left: 12px; */
    /* padding-right: 12px; */
    width: 100%;
    /* box-shadow: inset 0 0 0 1px rgba(0,47,52,.64); */
    border-radius: 5px;

}
.listing-categories input{
    border: none;
    background: #ebeeef;
    outline: none;
    height: 40px;
    width: 100px;
    border-bottom: 1px solid#ee0880;
    box-sizing: border-box;
    padding: 0 16px;
    margin: 0 8px 0 0;
    font-size: 14px;
}
.fule input {
    width: 20px;
    height: 20px;
}
.fule label{
    cursor: pointer;
    padding-left: 30px;
    font-size: 18px;
    color: #6c757d;
    flex: 1;
    align-self: center;
    font-size: 16px;
}
</style>
