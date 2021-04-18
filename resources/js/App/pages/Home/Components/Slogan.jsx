import React from 'react';
import  Aos  from 'aos';


import { FaBookReader , FaShareAlt  } from 'react-icons/fa'
import { GoVerified } from 'react-icons/go'

const Slogan = () => {
  return (
        <section className="slogan-container py-5" >
          <div className="container">
            <div className="row text-center justify-content-between">
              <div className="item1 col-lg-4 col-sm-3" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="50">
                <FaBookReader className="w-100 mb-3" style={{ 'fontSize':"50px" }} />
                <h2 className="slogan-text">Learn</h2>
              </div>
              <div className="item2 col-lg-4 col-sm-3" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="250">
                <GoVerified className="w-100 mb-3" style={{ 'fontSize':"50px" }} />
                <h2 className="slogan-text">Make</h2>
              </div>
              <div className="item2 col-lg-4 col-sm-3" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="450">
                <FaShareAlt className="w-100 mb-3" style={{ 'fontSize':"50px" }} />
                <h2 className="slogan-text">Share</h2>
              </div>
            </div>
          </div>    
        </section>
  )
}
export default Slogan;