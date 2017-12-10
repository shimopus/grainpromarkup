(function ($, undefined) {
    activateYaMetrica();
    appendStationSelector();

    var currentCarouselId = location.hash ? location.hash.match(/.*\/(\d+)\/carousel/) : null;
    currentCarouselId = currentCarouselId ? currentCarouselId[1] : null;
    var currentCardId = location.hash ? location.hash.match(/.*\/(\d+)\/card/) : null;
    currentCardId = currentCardId ? currentCardId[1] : null;

    function reloadTable(code) {
        var tableContent = $("div.jsTableContent");

        var params = null;
        if (code) {
            params = {code: code};
        }

        $("img.gn-loader").toggleClass("_hidden");
        $(".gn-table").remove();

        $.get("https://grainpro.herokuapp.com/pages/market-table/site", $.extend(params, {bidType: $bidType, v: "2"}))
            .done(function (data) {
                $("img.gn-loader").toggleClass("_hidden");
                tableContent.append(data);

                activateYaMetrica();

                if (currentCarouselId) {
                    $("#" + currentCarouselId).click();
                    currentCarouselId = null;
                }
                if (currentCardId) {
                    $("#" + currentCardId).click();
                    currentCardId = null;
                }
            })
            .fail(function () {
                $("img.gn-loader").toggleClass("_hidden");
                tableContent.append("Что-то пошло не так :(. Сообщите нам об этом, пожалуйста, любым удобным способом связи, указанным на сайте.");
            });
    }

    function appendStationSelector() {
        var stationSelector = $("input.jsStationsAutocomplete");

        stationSelector.autocomplete({
            source: function (request, response) {
                $.getJSON("https://grainpro.herokuapp.com/api/_search/stations", {
                    query: request.term
                }, function (data) {
                    response(modifyData(data));
                });
            },
            minLength: 2,
            select: function (event, ui) {
                console.log("Selected: " + ui.item.value + " aka " + ui.item.id);
                reloadTable(ui.item.id);
            }
        });

        $(".gn-input__clear").click(function () {
            stationSelector.val("");
            reloadTable();
        });
    }

    function modifyData(data) {
        return data.map(function (station) {
            return {value: station.name, id: station.code};
        });
    }

    function activateYaMetrica() {
        $("[data-fancybox][data-type='image']").on('click', function () {
            var image = $(this);
            fireAnalyticsEvent("TARGET_DOWNLOAD_BUY", {
                params: {
                    qualityPassport: image.attr("data-src").split("/").pop()
                }
            });
        });

        $("[data-fancybox][data-src^='#']").on('click', function () {
            var partner = $(this);
            fireAnalyticsEvent("TARGET_PARTNER_BUY", {
                partner: partner.text()
            });
        });

        $("input.jsStationsAutocomplete").on("autocompleteselect", function (event, ui) {
            fireAnalyticsEvent("TARGET_STATION_BUY", {
                station: ui.item.label + "(" + ui.item.value + ")"
            });
        });
    }

    function param(name) {
        return (location.search.split(name + '=')[1] || '').split('&')[0];
    }

    $(document).ready(function () {
        if (param("from") === "email") {
            $(window).load(function () {
                fireAnalyticsEvent("TARGET_FROM_EMAIL_BUY");
            });
        }
    });


    function filterTableByClass(classId) {
        var classText = "";
        switch (classId) {
            case "1class": {
                classText = "1кл";
                break;
            }
            case "withoutclass": {
                classText = "б/кл";
                break;
            }
            case "3class": {
                classText = "3кл";
                break;
            }
            case "4class": {
                classText = "4кл";
                break;
            }
            case "5class": {
                classText = "5кл";
                break;
            }
        }

        $(".gn-table__item-wrapper").each(function (index, row) {
            $(row)
                .find(".gn-table__class")
                .each(function (index, clazz) {
                    if ($(clazz).text() !== classText && "" !== classText) {
                        $(row).hide();
                    } else {
                        $(row).show();
                    }
                })
        });
    }

    $('.gn-filter__item').click(function () {
       filterTableByClass($(this).data("class"));
       $(".gn-filter__item._active").removeClass("_active");
       $(this).addClass("_active");
    });
})(jQuery);