<?php

use app\models\Boat;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Boats';
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = 'List';
$baseUrl = Url::base();
?>
<!-- nouisliderribute css -->
<link rel="stylesheet" href="<?= \Yii::getAlias('@web');?>/libs/nouislider/nouislider.min.css">

<div class="boat-index">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">Boat List</h5>
                        <div>
                            <?= Html::a('Register Boat', ['create'], ['class' => 'btn btn-danger']) ?>
                            <a class="btn btn-success" data-bs-toggle="collapse" href="#collapseExample"><i class="ri-filter-2-line align-bottom"></i> Filters</a>
                        </div>
                    </div>
                    <div class="collaps show" id="collapseExample">
                        <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1 mt-3 g-3">
                            <div class="col">
                                <h6 class="text-uppercase fs-12 mb-2">Search</h6>
                                <input type="text" class="form-control" placeholder="Search product name" autocomplete="off" id="searchProductList">
                            </div>
                            <div class="col">
                                <h6 class="text-uppercase fs-12 mb-2">Select Category</h6>
                                <select class="form-control" data-choices name="select-category" data-choices-search-false id="select-category">
                                    <option value="">Select Category</option>
                                    <option value="Artwork">Artwork</option>
                                    <option value="3d Style">3d Style</option>
                                    <option value="Photography">Photography</option>
                                    <option value="Collectibles">Collectibles</option>
                                    <option value="Crypto Card">Crypto Card</option>
                                    <option value="Games">Games</option>
                                    <option value="Music">Music</option>
                                </select>
                            </div>
                            <div class="col">
                                <h6 class="text-uppercase fs-12 mb-2">File Type</h6>
                                <select class="form-control" data-choices name="file-type" data-choices-search-false id="file-type">
                                    <option value="">File Type</option>
                                    <option value="jpg">Images</option>
                                    <option value="mp4">Video</option>
                                    <option value="mp3">Audio</option>
                                    <option value="gif">Gif</option>
                                </select>
                            </div>
                            <div class="col">
                                <h6 class="text-uppercase fs-12 mb-2">Sales Type</h6>
                                <select class="form-control" data-choices name="all-sales-type" data-choices-search-false id="all-sales-type">
                                    <option value="">All Sales Type</option>
                                    <option value="On Auction">On Auction</option>
                                    <option value="Has Offers">Has Offers</option>
                                </select>
                            </div>
                            <div class="col">
                                <h6 class="text-uppercase fs-12 mb-4">Price</h6>
                                <div class="slider" id="range-product-price"></div>
                                    <input class="form-control" type="hidden" id="minCost" value="0" />
                                    <input class="form-control" type="hidden" id="maxCost" value="1000" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="d-flex align-items-center mb-4">
                <div class="flex-grow-1">
                    <p class="text-muted fs-14 mb-0">Result: 8745</p>
                </div>
                <div class="flex-shrink-0">
                    <div class="dropdown">
                        <a class="text-muted fs-14 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            All View
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    <div class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-1" id="explorecard-list">
        <?php foreach ($model as $boat) { ?>
            <div class="col list-element">
                <div class="card explore-box card-animate">
                    <div class="explore-place-bid-img">
                        <?php if ($boat->image_file){ ?>
                            <img src="<?php echo $baseUrl.'/uploads/boatImages/'; echo $boat->image_file;?>" alt="" class="card-img-top explore-img" />
                        <?php } else { ?>
                            <img src="<?= \Yii::getAlias('@web');?>/images/nft/img-01.jpg" alt="" class="card-img-top explore-img" />
                        <?php } ?>
                        <div class="bg-overlay"></div>
                        <div class="place-bid-btn">
                            <a href="<?php echo Url::to(['boat/view','id'=>$boat->id]) ?>" class="btn btn-success"><i class="ri-eye-line align-bottom me-1"></i> View Boat</a>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <h5 class="mb-1"><a href="apps-nft-item-details"><?php echo $boat->boat_name?></a></h5>
                        <div class="badge rounded-pill <?php echo $boat->statusLabel?> fs-12"><?php echo $boat->status->name?></div>
                    </div>
                    <div class="card-footer border-top border-top-dashed">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 fs-14">
                                <i class="ri-price-tag-3-fill text-warning align-bottom me-1"></i><span class="fw-medium">Sample Data</span>
                            </div>
                            <h5 class="flex-shrink-0 fs-14 text-primary mb-0">sample Data</h5>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        
    </div>
    <!-- end row -->
    <div class="py-4 text-center" id="noresult" style="display: none;">
        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:72px;height:72px"></lord-icon>
        <h5 class="mt-4">Sorry! No Result Found</h5>
    </div>
    <div class="text-center mb-3">
        <button class="btn btn-link text-success mt-2" id="loadmore"><i class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i> Load More </button>
    </div>


    <p>
        
    </p>



</div>

<!-- nouisliderribute js -->
<script src="<?= \Yii::getAlias('@web');?>/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="<?= \Yii::getAlias('@web');?>/libs/nouislider/nouislider.min.js"></script>
<script src="<?= \Yii::getAlias('@web');?>/libs/wnumb/wNumb.min.js"></script>

<!-- <script src="<?= \Yii::getAlias('@web');?>/js/pages/apps-nft-explore.init.js"></script> -->
<script type="text/javascript">
    // Search product list
var searchProductList = document.getElementById("searchProductList");
    searchProductList.addEventListener("keyup", function () {
        var inputVal = searchProductList.value.toLowerCase();
        function filterItems(arr, query) {
            return arr.filter(function (el) {
                return el.title.toLowerCase().indexOf(query.toLowerCase()) !== -1
            })
        }

        var filterData = filterItems(allproductlist, inputVal);
        if (filterData.length == 0) {
            document.getElementById("noresult").style.display = "block";
            document.getElementById("loadmore").style.display = "none";
        } else {
            document.getElementById("noresult").style.display = "none";
            document.getElementById("loadmore").style.display = "block";
        }
        loadProductData(filterData);
    });

    // choices category input
    var productCategoryInput = new Choices(document.getElementById('select-category'), {
        searchEnabled: false,
    });

    productCategoryInput.passedElement.element.addEventListener('change', function (event) {
        var productCategoryValue = event.detail.value
        if (event.detail.value) {
            var filterData = allproductlist.filter(productlist => productlist.category === productCategoryValue);
            if (filterData.length == 0) {
                document.getElementById("noresult").style.display = "block";
                document.getElementById("loadmore").style.display = "none";
            } else {
                document.getElementById("noresult").style.display = "none";
                document.getElementById("loadmore").style.display = "block";
            }
        } else {
            var filterData = allproductlist;
        }
        loadProductData(filterData);
    }, false);


    // choices file-type
    var productFileTypeInput = new Choices(document.getElementById('file-type'), {
        searchEnabled: false,
    });

    productFileTypeInput.passedElement.element.addEventListener('change', function (event) {
        var productFileTypeValue = event.detail.value
        if (event.detail.value) {
            var filterData = allproductlist.filter(productlist => productlist.productImg.split('.').pop() == productFileTypeValue);
            if (filterData.length == 0) {
                document.getElementById("noresult").style.display = "block";
                document.getElementById("loadmore").style.display = "none";
            } else {
                document.getElementById("noresult").style.display = "none";
                document.getElementById("loadmore").style.display = "block";
            }
        } else {
            var filterData = allproductlist;
        }
        loadProductData(filterData);
    }, false);


    // choices category input
    var productCategoryInput = new Choices(document.getElementById('select-category'), {
        searchEnabled: false,
    });

    productCategoryInput.passedElement.element.addEventListener('change', function (event) {
        var productCategoryValue = event.detail.value
        if (event.detail.value) {
            var filterData = allproductlist.filter(productlist => productlist.category === productCategoryValue);
            if (filterData.length == 0) {
                document.getElementById("noresult").style.display = "block";
                document.getElementById("loadmore").style.display = "none";
            } else {
                document.getElementById("noresult").style.display = "none";
                document.getElementById("loadmore").style.display = "block";
            }
        } else {
            var filterData = allproductlist;
        }
        loadProductData(filterData);
    }, false);


    // choices sales input
    var productSalesInputInput = new Choices(document.getElementById('all-sales-type'), {
        searchEnabled: false,
    });

    productSalesInputInput.passedElement.element.addEventListener('change', function (event) {
        var productCategoryValue = event.detail.value
        if (event.detail.value) {
            var filterData = allproductlist.filter(productlist => productlist.salesType === productCategoryValue);
            if (filterData.length == 0) {
                document.getElementById("noresult").style.display = "block";
                document.getElementById("loadmore").style.display = "none";
            } else {
                document.getElementById("noresult").style.display = "none";
                document.getElementById("loadmore").style.display = "block";
            }
        } else {
            var filterData = allproductlist;
        }
        loadProductData(filterData);
    }, false);


    /*********************
        range-product-price
    **********************/
    var rangeProductPrice = document.getElementById('range-product-price');

    noUiSlider.create(rangeProductPrice, {
        start: [0, 1000], // Handle start position
        step: 10, // Slider moves in increments of '10'
        margin: 20, // Handles must be more than '20' apart
        connect: true, // Display a colored bar between the handles
        behaviour: 'tap-drag', // Move handle on tap, bar is draggable
        tooltips: [true, true],
        range: { // Slider can select '0' to '100'
            'min': 0,
            'max': 2000
        },
        format: wNumb({ decimals: 0 })
    });

    mergeTooltips(rangeProductPrice, 5, ' - ');

    var minCostInput = document.getElementById('minCost'),
        maxCostInput = document.getElementById('maxCost');

    var filterDataAll = '';

    // When the slider value changes, update the input and span
    rangeProductPrice.noUiSlider.on('change', function (values, handle) {
        var productListupdatedAll = allproductlist;
        if (handle) {
            maxCostInput.value = values[handle];

        } else {
            minCostInput.value = values[handle];
        }

        var maxvalue = maxCostInput.value;
        var minvalue = minCostInput.value;
        var filterDataAll = productListupdatedAll.filter(
            product => parseFloat(product.price) >= minvalue && parseFloat(product.price) <= maxvalue
        );
        loadProductData(filterDataAll);
    });

    /**
     * @param slider HtmlElement with an initialized slider
     * @param threshold Minimum proximity (in percentages) to merge tooltips
     * @param separator String joining tooltips
     */
    function mergeTooltips(slider, threshold, separator) {

        var textIsRtl = getComputedStyle(slider).direction === 'rtl';
        var isRtl = slider.noUiSlider.options.direction === 'rtl';
        var isVertical = slider.noUiSlider.options.orientation === 'vertical';
        var tooltips = slider.noUiSlider.getTooltips();
        var origins = slider.noUiSlider.getOrigins();

        // Move tooltips into the origin element. The default stylesheet handles this.
        Array.from(tooltips).forEach(function (tooltip, index) {
            if (tooltip) {
                origins[index].appendChild(tooltip);
            }
        });
        if (slider)
            slider.noUiSlider.on('update', function (values, handle, unencoded, tap, positions) {

                var pools = [
                    []
                ];
                var poolPositions = [
                    []
                ];
                var poolValues = [
                    []
                ];
                var atPool = 0;

                // Assign the first tooltip to the first pool, if the tooltip is configured
                if (tooltips[0]) {
                    pools[0][0] = 0;
                    poolPositions[0][0] = positions[0];
                    poolValues[0][0] = values[0];
                }

                for (var i = 1; i < positions.length; i++) {
                    if (!tooltips[i] || (positions[i] - positions[i - 1]) > threshold) {
                        atPool++;
                        pools[atPool] = [];
                        poolValues[atPool] = [];
                        poolPositions[atPool] = [];
                    }

                    if (tooltips[i]) {
                        pools[atPool].push(i);
                        poolValues[atPool].push(values[i]);
                        poolPositions[atPool].push(positions[i]);
                    }
                }

                Array.from(pools).forEach(function (pool, poolIndex) {
                    var handlesInPool = pool.length;

                    for (var j = 0; j < handlesInPool; j++) {
                        var handleNumber = pool[j];

                        if (j === handlesInPool - 1) {
                            var offset = 0;

                            Array.from(poolPositions[poolIndex]).forEach(function (value) {
                                offset += 1000 - value;
                            });

                            var direction = isVertical ? 'bottom' : 'right';
                            var last = isRtl ? 0 : handlesInPool - 1;
                            var lastOffset = 1000 - poolPositions[poolIndex][last];
                            offset = (textIsRtl && !isVertical ? 100 : 0) + (offset / handlesInPool) - lastOffset;

                            // Center this tooltip over the affected handles
                            tooltips[handleNumber].innerHTML = poolValues[poolIndex].join(separator);
                            tooltips[handleNumber].style.display = 'block';
                            tooltips[handleNumber].style[direction] = offset + '%';
                        } else {
                            // Hide this tooltip
                            tooltips[handleNumber].style.display = 'none';
                        }
                    }
                });
            });
    }


    // loadmore Js
    function _toConsumableArray(arr) {
        if (Array.isArray(arr)) {
            for (var i = 0, arr2 = Array(arr.length); i < arr.length; i++) {
                arr2[i] = arr[i];
            }
            return arr2;
        } else {
            return Array.from(arr);
        }
    }

    function loadMoreBtn() {
        var loadmore = document.querySelector("#loadmore");
        if (loadmore) {
            var currentItems = 10;
            loadmore.addEventListener("click", function (e) {

                var elementList = [].concat(
                    _toConsumableArray(document.querySelectorAll("#explorecard-list .list-element"))
                );
                if (elementList) {
                    for (var i = currentItems; i < currentItems + 5; i++) {
                        if (elementList[i]) {
                            elementList[i].style.display = "block";
                        }
                    }
                    currentItems += 5;

                    // Load more button will be hidden after list fully loaded
                    if (currentItems >= elementList.length) {
                        event.target.style.display = "none";
                    }
                }
            });
        }
    }
</script>
