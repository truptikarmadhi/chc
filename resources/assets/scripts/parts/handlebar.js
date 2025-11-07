let isLoading = false;
import Handlebars from 'handlebars';
export class HandleBars {
    init() {
        this.SearchHandlebar();
        this.handlebarTrigger();
        this.handlebarsFilter();
    }

    handlebarTrigger(){
        var triggerOnClick = $(".caseLoadmore");
        $("body").on("click", ".case-filter-btn", function () {
            $(".case-filter-btn").removeClass("active");
            $(this).addClass("active");
            triggerOnClick.attr("data-items", "4");
            $(".case-filter-check").prop('checked',false);
            window.handlebar.handlebarsFilter();
        });
        
        $("body").on("change", ".case-filter-check", function () {
            $(".case-filter-btn").removeClass("active");
            $(".case-filter-btn[data-tag='all']").addClass("active");
            $(".case-filter-check:checked").each(function () {
                $(".case-filter-btn").removeClass("active");
            })
            
            triggerOnClick.attr("data-items", "4");  // Reset load more amount
            window.handlebar.handlebarsFilter();
        });
        triggerOnClick.on("click", function (e) {
            e.preventDefault();
            var loadMoreVal =
                parseInt(triggerOnClick.attr("data-items")) + parseInt("4");
            triggerOnClick.attr("data-items", loadMoreVal);
            window.handlebar.handlebarsFilter();
        });
    }
    handlebarsFilter(){

        Handlebars.registerHelper('showCategories', function (categories) {
  let html = '';
  const total = categories.length;

  // sirf first 2 category show kar
  categories.slice(0, 2).forEach(cat => {
    html += `<div class="prefix bg-B4B4B4-btn hg-regular font14 leading18 res-font10 text-white radius5 d-inline-flex align-items-center me-2 text-nowrap mb-1">${cat.name}</div>`;
  });

  // agar 2 se jyada category ho to +count dikhaye
  if (total > 2) {
    html += `<div class="prefix bg-B4B4B4-btn hg-regular font14 leading18 res-font10 text-white radius5 d-inline-flex align-items-center me-2 text-nowrap mb-1">+${total - 2}</div>`;
  }

  return new Handlebars.SafeString(html);
});

        var selectedTags = [];
        $(".case-filter-btn.active").each(function () {
            selectedTags.push($(this).data('tag'));
        });
        $(".case-filter-check:checked").each(function () {
            selectedTags.push($(this).data('tag')); // Collect all selected categories
        });
        var template = "";
        var handlebarsContainer = $("#caseCardContainer");
        var loadMoreTrigger = $(".caseLoadmore");
        var loadMoreAmount = loadMoreTrigger.attr("data-items")
        var postBody = {
            action: "get_handlebars_ajax",
            cat: selectedTags.join(','),
            loadMoreAmount: loadMoreAmount,
        };
        if (!isLoading) {
          isLoading = true;

          jQuery.post(ajaxurl, postBody, function (response) {
            handlebarsContainer.html("Loading");
        
            var _response = JSON.parse(response);
    
                if (
                    typeof _response["handlebars"] != "undefined" &&
                    _response["handlebars"].length > 0
                ) {
                    handlebarsContainer.html("");
                
                    var handlebars = _response["handlebars"];
                    handlebars.map((item) => { 
                        var handlebarsTemplateSource =
                        document.getElementById("case-template").innerHTML;
                        template = Handlebars.compile(handlebarsTemplateSource);
                
                        var result = template(item);
                
                        handlebarsContainer.append(result);
                    });
                
                    if(_response["loadMoreNumber"] == _response["handlebars"].length){
                        loadMoreTrigger.hide();
                    }
                    else{
                        loadMoreTrigger.show();
                    }
                } else {
                    handlebarsContainer.html("No Posts Found");
                    loadMoreTrigger.hide();
                }
            isLoading = false;
          });
        }
    }

    SearchHandlebar() {
        jQuery(document).ready(function ($) {
            var $searchInput = $('.header-search-input'); 
            if (!$searchInput.length) {
                $searchInput = $('input[type="search"]').first();
            }

            $searchInput.on('keydown', function (e) {
                if (e.key === 'Enter' || e.keyCode === 13) {
                    e.preventDefault();

                    var term = $.trim($(this).val());
                    if (!term.length) return;

                    $.ajax({
                        url: tpSearchRedirect.ajax_url,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            action: 'tp_search_redirect',
                            term: term,
                            nonce: tpSearchRedirect.nonce,
                        },
                        success: function (resp) {
                            if (resp && resp.success && resp.data && resp.data.url) {
                                window.location.href = resp.data.url;
                            } else {
                                window.location.href =
                                    tpSearchRedirect.fallback_search_url +
                                    encodeURIComponent(term);
                            }
                        },
                        error: function () {
                            window.location.href =
                                tpSearchRedirect.fallback_search_url +
                                encodeURIComponent(term);
                        },
                    });
                }
            });
        });

    }
}