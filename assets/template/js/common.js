var active       = 'active',
    select       = $('.select'),
    show         = $('.show'),
    close        = $('.close'),
    modal        = $('.modal'),
    selectInput  = $('.select-input');

var status = 'LOAD';
var search = $('.search--wrapper');
var header = $('.header');
var range = 120;

$(window).on('scroll', function () {

    var scrollTop = $(this).scrollTop(),
        height = search.outerHeight(),
        offset = height / 2,
        calc = 1 - (scrollTop - offset + range) / range;

    search.css({ 'opacity': calc });

    if (calc > '1') {
        search.css({ 'opacity': 1 });
        header.css({ 'background': 'transparent' });
    } else if ( calc < '0' ) {
        search.css({ 'opacity': 0 });
        header.css({ 'background': '#000' });
    }

});


//Модальные окна
function openModal(modalName, errorText) {
    console.log(modalName);
    modal.addClass(active);
    $(modalName).addClass(active);
    if (errorText) {
        $(modalName).find('.desc').text(errorText);
    }
}
function closeModal() {
    modal.removeClass(active);
    modal.find('.modal__content').removeClass(active);
}
show.click(function () {
    openModal($(this).attr('data-modal'));
    return false;
});
close.click(function () {
    closeModal();
    return false;
});






let buyPhoto = {
    photoId: 0,
    photoPrev: '',
    photoType: '',
    confirmWrapper: $('.confirm'),
    confirmWrapperImage: $('.confirm__image img'),
    confirmWrapperText: $('.confirm__text'),
    confirmHtml: '<div class="confirm__text"> <h2><div>' + LANG.confirm_title + '</div></h2> <p>' + LANG.confirm_subdesc + '</p> <div> <button class="green" onclick="buyPhoto.buy()">' + LANG.confirm_yes + '</button> <button class="error" onclick="buyPhoto.close()">' + LANG.confirm_no + '</button> </div> </div>',
   	buyHtml: '<div class="confirm__text"> <h2>' + LANG.confirm_succes_title + '</h2><p>' + LANG.confirm_succes_sub + '</p> <div> <button class="green" onclick="buyPhoto.close()">' + LANG.confirm_succes_more + '</button></div> </div>',
    balansWrapper: $('.balans'),
    init: function(element) {
        this.photoId = $(element).data('id');
        this.photoPrev = $(element).data('image');
        this.photoType = $(element).data('type');

        this.confirm(this.photoPrev, this.photoType);
    },
    confirm: function(image, type) {
    	this.photoType === 'modal' ? this.confirmWrapper.addClass('not-image') : null;
    	this.confirmWrapperText.html(this.confirmHtml);
    	this.confirmWrapper.addClass('loading');
    	this.confirmWrapperImage.attr('src', image);
    	this.confirmWrapperImage.load(function(){
		    setTimeout(() => {
	    		buyPhoto.confirmWrapper.removeClass('loading');
	    		buyPhoto.confirmWrapper.addClass('active');
	    	}, 500);
		});
    	
    },
    buy: function(id) {
    	id ? this.photoId = id : null;
    	console.log(id);
        console.log('FETCH');
        $.ajax({
            type: "POST",
            url: "/change-balans",
            data: {photoId: buyPhoto.photoId},
            success: function(response) {
                let res = $.parseJSON(response);
                console.log(res);
                buyPhoto.handler(res);
            },
            complete: function(response) {
                console.log(response);
            }
        });
    },
    history: function(id) {
    	let photoId = id;
        $.ajax({
            type: "POST",
            url: "/download-images",
            data: {photoId: photoId},
            success: function(response) {
                let res = $.parseJSON(response);
                console.log(res);
                buyPhoto.handler(res);
            },
            complete: function(response) {
                console.log(response);
            }
        });
    },
    handler: function({status, balans, imageSmall = null, imageBig = null, message, buyPhotos}) {
        console.log(status, balans, imageSmall, imageBig, message, buyPhotos);
        switch (status) {
            case 500:
                this.error(balans, message);
                break;
            case 200:
                this.success(balans, imageBig);
                break;
            default:
                false;
        }
    },
    error: function(balans, message) {
        console.log(balans, message);
        replenish.open(message);
    },
    success: function(balans, bigImage) {
    	this.confirmWrapperText.html(this.buyHtml);
        this.balansWrapper.html(balans);
		this.download(bigImage);
        console.log(balans, bigImage);
    },
    toDataURL: function(url) {
		return fetch(url).then((response) => {
		    return response.blob();
		}).then(blob => {
		    return URL.createObjectURL(blob);
		});
    },
    toRandomString: function(length) {
	   let result           = '';
	   let characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
	   let charactersLength = characters.length;
	   for ( let i = 0; i < length; i++ ) {
	      result += characters.charAt(Math.floor(Math.random() * charactersLength));
	   }
	   return result;
    },
    async download(url) {
        const a = document.createElement("a");
        a.href = await this.toDataURL(url);
        a.download = 'surveyfotos-' + this.toRandomString(25) + '-geokurs' + '.jpg';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
	},
    close: function() {
    	this.confirmWrapper.removeClass('loading');
    	this.confirmWrapper.removeClass('active');
    	setTimeout(() => {
			buyPhoto.confirmWrapper.removeClass('not-image');
    	}, 1000);

    	this.photoId = 0;
        this.photoPrev = '';
        this.photoType = '';
    }
}

let inputSum = document.querySelector('input[name=sum]');

if (inputSum) {
	inputSum.addEventListener("keyup", event => {
	    let value = event.target.value;
	    value.length >= 1 ? replenish.result(value) : this.prop('disabled', true);
	});
}


let replenish = {
	wrapper: $('.replenish'),
	sum: $('.curency_result'),
	button: $('input[name=sub]'),
	title: $('.replenish--wrapper h2'),
	open: function(message = LANG.replenish_title) {
		this.wrapper.addClass('active');
		this.title.html(message);
	}, 
	close: function() {
		this.wrapper.removeClass('active');
	},
	result: function(value) {
		this.sum.html(value * 400);
		this.sum.parent().addClass(active);
		this.button.prop('disabled', false);
	}
}

let msuccess = {
	wrapper: $('.msuccess'),
	title: $('.msuccess--wrapper h2'),
	open: function(message = LANG.success_title) {
		this.wrapper.addClass('active');
		this.title.html(message);
	}, 
	close: function() {
		this.wrapper.removeClass('active');
	}
}

let alert = {
    wrapper: $('.alert'),
    title: $('.alert h2'),
    open: function(message = LANG.success_title) {
        this.wrapper.addClass('active');
        this.title.html(message);
    }, 
    close: function() {
        this.wrapper.removeClass('active');
    }
}



let balans = {
	balansWrapper: $('.balans'),
	successModal: $('.msuccess'),
	formWrapper: $('.replenish--form'),
	buyWrapper: $('.replenish--buy'),
	loaderWrapper: $('.replenish--loader'),
	start: function(event) {
		event.preventDefault();
		this.formWrapper.css('display', 'none');
		this.buyWrapper.css('display', 'block');
	},
	user: function() {
		return $('#userID').text();
	},
	amount: function() {
		return inputSum.value;
	},
	update: function(balans) {
		this.balansWrapper.html(balans);
		msuccess.open();
	}
}


paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      balans.loaderWrapper.addClass('active');
      return actions.order.create({
        purchase_units: [{
       	  custom_id: balans.user(),
          amount: {
            value: balans.amount()
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
       	console.log(details);
        balans.loaderWrapper.removeClass('active');
       	let sum = details.purchase_units[0].amount.value;
       	let id = details.purchase_units[0].custom_id;

       	if (details.status === 'COMPLETED') {

       		$.ajax({
	            type: "POST",
	            url: "/result",
	            data: {
	            	sum: sum,
	            	id: id
	            },
	            success: function(response) {
	                let res = $.parseJSON(response);

	                if (res.status === 200) {
	                	replenish.close();
						balans.update(res.balans);
	                }
	            }
        	});
       	} else {
       		alert.open(LANG.pay_error)
       	}
      });
    },
    onCancel: function(e) {
        replenish.close();
        balans.loaderWrapper.removeClass('active');
        alert.open(LANG.pay_error);
    }
  }).render('#paypal-button-container');
  




let modalPhoto = {
    openButton: $('.modal-open'),
    closeButton: $('.modal-close'),
    container: $('.photo'),
    wrapper: $('#container'),
    body: $('body'),
    id: 0,
    lang: '',
    timer: null,
    loading: false,
    open: function(element) {
        this.id = $(element).data('item');
        this.lang = $(element).data('lang');
        this.loadingModal(this.id, this.lang);
    },
    close: function() {
        this.body.removeClass('modal--open');
        this.container.removeClass(active);
        setTimeout(function () {
            modalPhoto.wrapper.html('');
        }, 500);
    },
    loadingModal: function(id, lang) {
        console.log('STATUS', this.loading);
        if (this.loading) {
            this.container.removeClass('loading');
            this.loading = false;
        } else {
            this.container.addClass('loading');
            this.loading = true;
            this.fetch(this.id, this.lang);
        }
    },
    fetch: function(id, lang) {
        console.log('FETCH');
        let query = LANG.id === 'web' ? '/getcontent' : '/eng/getcontent';
        $.ajax({
            type: "POST",
            url: query,
            data: `id=${id}&lang=${LANG.id}`,
            success: function(content) {
                modalPhoto.wrapper.html(content);
            },
            complete: function() {
                modalPhoto.completeModal();
            }
        });
    },
    completeModal: function() {
        console.log('COMPLETE AND OPEN', this.loading);
        this.body.addClass('modal--open');
        modalPhoto.waterfallInit();
        this.timer = setTimeout(() => {
           modalPhoto.loadingModal();
           modalPhoto.container.addClass(active);
           this.timer = clearTimeout(this.timer);
        }, 1000);
    },
    waterfallInit: function() {
        $('.photos--modal-grow').waterfall(settingPhoto);

    },
};


var setting = {
    gap: 10,
    gridWidth: [0, 400, 600],
    refresh: 700,
    scrollbottom: {
        ele: $('body'),
        gap: 200,
        endtxt: 'No More Data !!',
        callback: function (container) {
            images.homeInit();
            var btn = $('.btn-more');
            if (inView(btn)) {
                status = 'DONE';

                //$('#pdopage').addClass('loading');
                btn.trigger('click');
            }  
            pdoPage.callbacks['after'] = function(config, response) {
                 console.log('DONE');
                if (response) {
                    setTimeout(() => {
                        $('#pdopage').removeClass('loading');
                     }, 750);
                    container.waterfall('sort');
                    status = 'LOAD';

                    //modalPhoto.init();
                } else {
                    container.waterfall('end');
                }
            }
        }
    }
};

var settingPhoto = {
    gap: 10,
    gridWidth: [0, 400, 600],
    refresh: 700,
};


let images =  {
    homeInit: function () {
        $('.lazy').lazy({
            afterLoad: function(element) {
                element.parent().addClass(active);
                element.addClass(active);
                $('.photos--home').waterfall(setting);
            }
        });
    },
    modalInit: function () {
        $('.lazy').lazy({
            afterLoad: function(element) {
                element.parent().addClass(active);
                element.addClass(active);
            }
        });
    }
};

images.homeInit();




let inView = element => {
    var rect = element.get(0).getBoundingClientRect();

    return ( 
        rect.top >= 0 && 
        rect.left >= 0 && 
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && 
        rect.right <= (window.innerWidth || document.documentElement.clientWidth) &&
        status === 'LOAD'
    );
}
 

let addtoFovorite = {
    photo: '',
    action: '',
    controller: '/add-favorite',
    init: function(element) {
        this.action = $(element).data('action');
        this.photo = $(element).data('favorite');
        $(element).toggleClass(active);

        this.ajax(this.photo, this.action);
    },
    ajax: function(id, action) {
        console.log('FAVORITES');
        $.ajax({
            type: "POST",
            url: this.controller,
            data: {id, action},
            success: function(response) {
                let res = $.parseJSON(response);
                console.log(res);
            },
            complete: function(response) {
                console.log(response);
            }
        });
    }

};



var focusInput = function () {
    var inputForm = document.querySelectorAll('input[name=search]');
    for (var i = 0; i < inputForm.length; i++) {
        inputForm[i].addEventListener('focus', function () {
            this.nextElementSibling.classList.add(active);
        });
        inputForm[i].addEventListener('blur', function () {
            console.log(this.value.length);
            if (!this.value.length > 0) {
                this.nextElementSibling.classList.remove(active);
            }
        });
    }
};

focusInput();


