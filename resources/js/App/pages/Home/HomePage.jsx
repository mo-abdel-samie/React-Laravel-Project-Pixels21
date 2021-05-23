import React from 'react';
import Slogan from '../Home/Components/Slogan';
import About from './Components/About';
import Header from './Components/Header';
import PixelsAdmin from './Components/PixelsAdmin';
import SeeMagazine from './Components/SeeMagazine';
import Sponsor from './Components/Sponsor';
import Statestics from './Components/Statestics';
import TimeLine from './Components/TimeLine';
import Articles from '../../Components/Articles';


import './HomeStyles.css'; 

function HomePage() {
    return (

<>
    <Header />
    <main>
        <Slogan />
        <About />
        <SeeMagazine />
        <Articles />
        <Statestics />
        <TimeLine />
        <PixelsAdmin />
        {/* <Sponsor /> */}
    </main>
</>

    );
}


export default HomePage;
