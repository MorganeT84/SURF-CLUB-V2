import React from 'react';

import { Carousel } from '../Carousel';
import { CardSession } from '../CardSession/index';

export default function Home() {
  return (
    <div className='main'>
      <h1>Surf Club Catalan</h1>
      <Carousel />
      <CardSession />
    </div>
  )
}
