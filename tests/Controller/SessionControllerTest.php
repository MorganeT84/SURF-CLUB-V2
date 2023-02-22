<?php

namespace App\Test\Controller;

use App\Entity\Session;
use App\Repository\SessionRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SessionControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private SessionRepository $repository;
    private string $path = '/api/v1/session/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Session::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Session index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'session[slug]' => 'Testing',
            'session[title]' => 'Testing',
            'session[description]' => 'Testing',
            'session[dayTime]' => 'Testing',
            'session[dayTimeEnd]' => 'Testing',
            'session[picture]' => 'Testing',
            'session[numberOfPlace]' => 'Testing',
            'session[createdAt]' => 'Testing',
            'session[updatedAt]' => 'Testing',
            'session[level]' => 'Testing',
            'session[spot]' => 'Testing',
            'session[category]' => 'Testing',
        ]);

        self::assertResponseRedirects('/api/v1/session/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Session();
        $fixture->setSlug('My Title');
        $fixture->setTitle('My Title');
        $fixture->setDescription('My Title');
        $fixture->setDayTime('My Title');
        $fixture->setDayTimeEnd('My Title');
        $fixture->setPicture('My Title');
        $fixture->setNumberOfPlace('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setLevel('My Title');
        $fixture->setSpot('My Title');
        $fixture->setCategory('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Session');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Session();
        $fixture->setSlug('My Title');
        $fixture->setTitle('My Title');
        $fixture->setDescription('My Title');
        $fixture->setDayTime('My Title');
        $fixture->setDayTimeEnd('My Title');
        $fixture->setPicture('My Title');
        $fixture->setNumberOfPlace('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setLevel('My Title');
        $fixture->setSpot('My Title');
        $fixture->setCategory('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'session[slug]' => 'Something New',
            'session[title]' => 'Something New',
            'session[description]' => 'Something New',
            'session[dayTime]' => 'Something New',
            'session[dayTimeEnd]' => 'Something New',
            'session[picture]' => 'Something New',
            'session[numberOfPlace]' => 'Something New',
            'session[createdAt]' => 'Something New',
            'session[updatedAt]' => 'Something New',
            'session[level]' => 'Something New',
            'session[spot]' => 'Something New',
            'session[category]' => 'Something New',
        ]);

        self::assertResponseRedirects('/api/v1/session/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getSlug());
        self::assertSame('Something New', $fixture[0]->getTitle());
        self::assertSame('Something New', $fixture[0]->getDescription());
        self::assertSame('Something New', $fixture[0]->getDayTime());
        self::assertSame('Something New', $fixture[0]->getDayTimeEnd());
        self::assertSame('Something New', $fixture[0]->getPicture());
        self::assertSame('Something New', $fixture[0]->getNumberOfPlace());
        self::assertSame('Something New', $fixture[0]->getCreatedAt());
        self::assertSame('Something New', $fixture[0]->getUpdatedAt());
        self::assertSame('Something New', $fixture[0]->getLevel());
        self::assertSame('Something New', $fixture[0]->getSpot());
        self::assertSame('Something New', $fixture[0]->getCategory());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Session();
        $fixture->setSlug('My Title');
        $fixture->setTitle('My Title');
        $fixture->setDescription('My Title');
        $fixture->setDayTime('My Title');
        $fixture->setDayTimeEnd('My Title');
        $fixture->setPicture('My Title');
        $fixture->setNumberOfPlace('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setLevel('My Title');
        $fixture->setSpot('My Title');
        $fixture->setCategory('My Title');

        $this->repository->save($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/api/v1/session/');
    }
}
