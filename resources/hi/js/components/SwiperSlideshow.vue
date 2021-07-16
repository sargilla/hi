<template>
	<section>
        <div ref="parent"  class="swiper-container swiper-parent">
            <div class="swiper-wrapper">
                <slot></slot>
            </div>
            <div ref='prev' class="swiper-button-prev"><i class="fas fa-angle-left"></i></div>
            <div ref='next' class="swiper-button-next"><i class="fas fa-angle-right"></i></div>
        </div>
    </section>
</template>
<script>
	import Swiper from 'swiper';
	import 'swiper/dist/css/swiper.min.css';
	export default {
		props: {
			direction: {default: 'horizontal'},
			speed: {default: 300},
			autoplay: {default: 999999999},
            loop: {default: false},
            slidesPerView: {default: 1},
			effect: {default: 'slide'},
            grabCursor: {default: true},
            fullscreen: {default:false}
		},
		mounted() {
			new Swiper(this.$refs.parent, {
			    direction: this.direction,
                speed: Number( this.speed ),
                autoplay: {
                    delay: this.autoplay
                },
                loop: this.loop,
                effect: this.effect,
                slidesPerView: Number(this.slidesPerView),
                grabCursor: this.grabCursor,
                // pagination: {
                //     el: Pagination,
                //     clickable: PaginationClickable
                // },
                navigation: {
                    prevEl: this.$refs.prev,
                    nextEl: this.$refs.next
                },
			})
		}
	}
</script>

