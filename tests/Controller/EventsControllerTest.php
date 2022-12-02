<?php

namespace App\Test\Controller;

use App\Entity\Events;
use App\Repository\EventsRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EventsControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EventsRepository $repository;
    private string $path = '/events/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Events::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Event index');

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
            'event[name]' => 'Testing',
            'event[date]' => 'Testing',
            'event[time]' => 'Testing',
            'event[description]' => 'Testing',
            'event[image]' => 'Testing',
            'event[capacity]' => 'Testing',
            'event[email]' => 'Testing',
            'event[pnumber]' => 'Testing',
            'event[address]' => 'Testing',
            'event[url]' => 'Testing',
            'event[type]' => 'Testing',
        ]);

        self::assertResponseRedirects('/events/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Events();
        $fixture->setName('My Title');
        $fixture->setDate('My Title');
        $fixture->setTime('My Title');
        $fixture->setDescription('My Title');
        $fixture->setImage('My Title');
        $fixture->setCapacity('My Title');
        $fixture->setEmail('My Title');
        $fixture->setPnumber('My Title');
        $fixture->setAddress('My Title');
        $fixture->setUrl('My Title');
        $fixture->setType('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Event');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Events();
        $fixture->setName('My Title');
        $fixture->setDate('My Title');
        $fixture->setTime('My Title');
        $fixture->setDescription('My Title');
        $fixture->setImage('My Title');
        $fixture->setCapacity('My Title');
        $fixture->setEmail('My Title');
        $fixture->setPnumber('My Title');
        $fixture->setAddress('My Title');
        $fixture->setUrl('My Title');
        $fixture->setType('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'event[name]' => 'Something New',
            'event[date]' => 'Something New',
            'event[time]' => 'Something New',
            'event[description]' => 'Something New',
            'event[image]' => 'Something New',
            'event[capacity]' => 'Something New',
            'event[email]' => 'Something New',
            'event[pnumber]' => 'Something New',
            'event[address]' => 'Something New',
            'event[url]' => 'Something New',
            'event[type]' => 'Something New',
        ]);

        self::assertResponseRedirects('/events/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getName());
        self::assertSame('Something New', $fixture[0]->getDate());
        self::assertSame('Something New', $fixture[0]->getTime());
        self::assertSame('Something New', $fixture[0]->getDescription());
        self::assertSame('Something New', $fixture[0]->getImage());
        self::assertSame('Something New', $fixture[0]->getCapacity());
        self::assertSame('Something New', $fixture[0]->getEmail());
        self::assertSame('Something New', $fixture[0]->getPnumber());
        self::assertSame('Something New', $fixture[0]->getAddress());
        self::assertSame('Something New', $fixture[0]->getUrl());
        self::assertSame('Something New', $fixture[0]->getType());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Events();
        $fixture->setName('My Title');
        $fixture->setDate('My Title');
        $fixture->setTime('My Title');
        $fixture->setDescription('My Title');
        $fixture->setImage('My Title');
        $fixture->setCapacity('My Title');
        $fixture->setEmail('My Title');
        $fixture->setPnumber('My Title');
        $fixture->setAddress('My Title');
        $fixture->setUrl('My Title');
        $fixture->setType('My Title');

        $this->repository->save($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/events/');
    }
}
