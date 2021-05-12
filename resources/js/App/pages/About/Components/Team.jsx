import React from 'react';

import { Swiper, SwiperSlide } from 'swiper/react';

import SwiperCore, { EffectCoverflow } from 'swiper';


import 'swiper/swiper.scss';
import 'swiper/components/effect-coverflow/effect-coverflow.scss';




SwiperCore.use([EffectCoverflow]);


export default function Team() {
    return ( 
        <section className="team-section p-5">
            <h2 className="text-light h1 font-weight-bold">Meet Our Team</h2>
            <div className="team-slider">

                <Swiper
                    effect="coverflow"
                    coverflowEffect= {{
                        rotate: 0,
                        stretch: 0,     
                        depth: 0,
                        modifier: 1,
                        slideShadows: true,
                    }}
                    loop={ true }
                    spaceBetween={30}
                    slidesPerView = { 'auto' }
                    centeredSlides = { true }
                    grabCursor = { true }
                    >

                    {[
                        {
                        name : "Mohamed Abdel-samie",
                        posetion : 'IT Head',
                        img : 'IT Vice - Mohamed Abdelsamie.jpg'
                        },
                        {
                        name : "Noor El Deen Magdy.jpg",
                        posetion : 'President',
                        img : 'President - Noor El Deen Magdy.jpg'
                        },  
                        {
                        name : "Ammar Mohamed",
                        posetion : 'Vice President',
                        img : 'Vice President - Ammar Mohamed.jpg'
                        },
                        {
                        name : "Omar Abdelrahman",
                        posetion : 'ER Head',
                        img : 'ER Head - Omar Abdelrahman.jpg'
                        },
                        {
                        name : "Youssef Hussien",
                        posetion : 'Academic Head',
                        img : 'Academic Head - Youssef Hussien.jpg'
                        },
                        {
                        name : "Yomna Labib",
                        posetion : 'Media and Marketing Vice',
                        img : 'Media and Marketing Vice - Yomna Labib.jpg'
                        },
                        {
                        name : "Manar Hashem",
                        posetion : 'HR Head',
                        img : 'HR Head - Manar Hashem.jpg'
                        },
                        {
                        name : "Mohamed Damesh",
                        posetion : 'Academic Vice',
                        img : 'Academic Vice - Mohamed Damesh.jpg'
                        },

                    ].map( (item) => (
                        <SwiperSlide key={item}>
                            <div className="member-content p-4">
                                <img className="img-fluid rounded-circle" src={ `/images/pixels-board/${item.img}` } alt="hello"/>
                                <div className="box-info">
                                    <h4>{ item.name } </h4>
                                    <span>{ item.posetion }</span>
                                </div>
                            </div>
                        </SwiperSlide>
                    ))}
                    

                </Swiper>
            </div>
        </section>
    )
}
