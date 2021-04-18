import React, { Component } from 'react';
import { Link } from 'react-router-dom';


class Footer extends Component {

    state = {
        btnUp:true,
        name:"",
        phone:"",
        email:""
    }


    handleBtnUp = () => {
        console.log("scrool");
        if(window.scrollY > 700){
            this.setState({btn:true});
        }else {
            this.setState({btn:false});
        }
    }

    render() {
        return (
            <footer>
            <div className =" container">
                <div className ="row">
                    <div className ="col-lg-7 pl-lg-5 p-3">
                        <img  src="/images/MagazineImg/logo.png" width="100px" alt="Pixels" />
                        <p className ="my-3 text-muted text-justify">
                        Pixels is a student activity at faculty of engineering Helwan University, aims to spread the engineering science, to create a productive community through many tracks such as academic track, competitions track, camps track, Juniors track and Projects track.                        </p>
                        <div className =" mt-4 justify-content-around d-flex">

                            <a target="_blanck" href="https://www.facebook.com/PixelsEgyptOrg/"      > <i className="text-white fa-2x fab fa-facebook-f"></i>  </a>
                            <a target="_blanck" href="https://twitter.com/pixelsegypt?lang=en"      className="text-white " > <i className="text-white fa-2x fab fa-twitter"></i>    </a>
                            <a target="_blanck" href="https://www.instagram.com/pixelsegypt/"       className="text-white " > <i className="text-white fa-2x fab fa-instagram"></i>  </a>
                            <a target="_blanck" href="https://www.youtube.com/c/PixelsEgypt"        className="text-white " > <i className="text-white fa-2x fab fa-youtube"></i>    </a>
                            <a target="_blanck" href="https://www.linkedin.com/company/pixels-hsb/" className="text-white " > <i className="text-white fa-2x fab fa-linkedin-in"></i></a>
                        </div>
                    </div>

                    <div className ="col-lg-5 pl-lg-5 p-3 quick-link">
                        <h5>Quick Link</h5>
                        <ul>
                            <li> <i className ="fas fa-angle-right"></i><Link className = "text-white" to="/"> Home     </Link> </li>
                            <li> <i className ="fas fa-angle-right"></i><Link className = "text-white" to="/"> Blogs    </Link> </li>
                            <li> <i className ="fas fa-angle-right"></i><Link className = "text-white" to="/"> Events   </Link> </li>
                            <li> <i className ="fas fa-angle-right"></i><Link className = "text-white" to="/"> Magazine </Link> </li>
                        </ul>
                    </div>

                    {/* <div className ="col-lg-4 pl-lg-5 p-3 get-app">
                        <form className="py-5 px-3 rounded text-center form-custome">
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

                            <input className = "btn btn-outline-primary rounded-pill" type="submit" value="Subscribe"/>

                        </form>
                    </div> */}
                </div>
            </div>

            <div className ="copy-rights  mt-5">
                <div className ="container font-weight-bold">
                    <div className ="row d-flex justify-content-between  ">
                        <div className ="col-10 py-2">
                            <p className="text-center m-0"><span className =" text-main">Pixels</span>©All Rightreseved-2020</p>
                        </div>
                        {/* <div  className = "btn-up go-top" >
                            <i className ="fa fa-arrow-up fa-2x"></i>
                        </div> */}
                    </div>
                </div>
            </div>

        </footer>
        );
    }
}

export default Footer;

