import React , { useEffect } from 'react';
import Aos from "aos";

function Header() {

    useEffect(() => {
        Aos.init({duration: 2000});
    }, []);

    return (
        <>
        <header style={{"backgroundImage": "url('/images/pixelsG.JPG')"}} data-aos="zoom-in"  className="text-white overflow-hidden" id="home">
            <div className="center text-center " style= {{ 'top':"70%" }}>
                <img src="/images/sloganPixels.png" className="pixels-logo" alt ="Pixels"/>
                {/* <h4 className="mb-4 mt-5 pixels-shout">
                    We Learn ...We Make ...We Share
                    <br/>
                    We Are Pixels
                </h4> */}

                {/* <!-- Button trigger modal --> */}
                {/* <span type="button" className="text-white mt-5" data-toggle="modal" data-target="#exampleModal">
                    <i className="fa fa-arrow-down"></i>
                </span> */}



            </div>
            <div className="social">
                <ul>
                    <li> <a target="_blanck" href="https://www.facebook.com/PixelsEgyptOrg/"      > <i className="fab fa-facebook-f" ></i>  </a> </li>
                    <li> <a target="_blanck" href="https://twitter.com/pixelsegypt?lang=en"       > <i className="fab fa-twitter"></i>      </a> </li>
                    <li> <a target="_blanck" href="https://www.instagram.com/pixelsegypt/"        > <i className="fab fa-instagram"></i>    </a> </li>
                    <li> <a target="_blanck" href="https://www.youtube.com/c/PixelsEgypt"         > <i className="fab fa-youtube"></i>      </a> </li>
                    <li> <a target="_blanck" href="https://www.linkedin.com/company/pixels-hsb/"  > <i className="fab fa-linkedin-in"></i>  </a> </li>
                </ul>
            </div>

            {/* <Shout /> */}
        </header>

           {/* Modal  */}
           <div className="modal fade" id="exampleModal" tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div className="modal-dialog" role="document">
               <div className="modal-content">
               <div className="modal-header">
                   <h5 className="modal-title" id="exampleModalLabel">News Subscribetion </h5>
                   <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                   </button>
                </div>
                <div className="modal-body">
                <div className ="col-lg-12 p-3 get-app">
                        <form className="rounded text-center form-custome">
                            <h3>Our News</h3>
                            <p>
                                Subscribe us to know new events and articels
                            </p>
                            <div className="form-group">
                                <label className =" form-lable"  >Name</label>
                                <input className="form-control rounded-pill" type="text" placeholder="Ex: Mohamed..."/>
                            </div>
                            <div className="form-group">
                                <label className =" form-lable"  >Email</label>
                                <input className="form-control rounded-pill" type="email" placeholder="example.com"/>
                            </div>

                            <a className = "btn btn-outline-primary rounded-pill"  href="#about" data-dismiss="modal" > Subscribe</a>

                        </form>
                    </div>
               </div>

               </div>
           </div>
           </div>
           </>
    );
}

export default Header;

