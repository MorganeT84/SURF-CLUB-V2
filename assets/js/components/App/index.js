// ./assets/js/components/Home.js

import React, { Component } from 'react';
import { Route, Routes } from 'react-router-dom';

import Header from '../Header';
import Home from '../Home';
import Footer from '../Footer';
import Sessions from '../Sessions';
import Team from '../Team';
import Spots from '../Spots';
import SurfCamps from '../SurfCamps';
import Contact from '../Contact';

class App extends Component {

  render() {
    return (
      <div className='app'>
        <Header />

        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/sessions" element={<Sessions />} />
          <Route path="/team" element={<Team />} />
          <Route path="/spots" element={<Spots />} />
          <Route path="/surf-camps" element={<SurfCamps />} />
          <Route path="/contact" element={<Contact />} />
        </Routes>

        <Footer />
      </div>
    )
  }
};

export default App;
