import React from 'react';
import './magazin.css';
import Header from './Components/Header';
import db   from './magData.json';
import Content from './Components/Content';
import WhatIs from './Components/WhatIs';
import Articals from './Components/Articals';

export default function Magazine() {
    return (
        <section className = "magazin">
            <Header />

            <WhatIs definition = {db.data.magazin.what} />

            <Content contents  = {db.data.magazin.contents} />

            <Articals articals = {db.data.magazin.magazinArticles} />

        </section>
    )
}
