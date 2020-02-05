<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use DateTimeImmutable;

class AppFixtures extends Fixture
{
    public function load(\Doctrine\Persistence\ObjectManager $manager)
    {

        $user = new User();
        $user->setFirstName('Anastasiya');
        $user->setSecondName('Vologodskaya');
        $user->setEmail('vologdalogda@mail.ru');
        $date = new DateTimeImmutable("1996-09-12 11:45 Europe/Moscow");
        $user->setBirthDate(\DateTime::createFromImmutable($date));
        $manager->persist($user);

        $user = new User();
        $user->setFirstName('Vladimir');
        $user->setSecondName('Polertnov');
        $user->setEmail('polertnov@mail.ru');
        $date = new DateTimeImmutable("1989-05-23 23:23 Europe/Moscow");
        $user->setBirthDate(\DateTime::createFromImmutable($date));
        $manager->persist($user);

        $user = new User();
        $user->setFirstName('Svetlana');
        $user->setSecondName('Ivanchuk');
        $user->setEmail('ivanchuk@mail.ru');
        $date = new DateTimeImmutable("1988-12-22 15:44 Europe/Moscow");
        $user->setBirthDate(\DateTime::createFromImmutable($date));
        $manager->persist($user);

        $user = new User();
        $user->setFirstName('Kate');
        $user->setSecondName('Eliseeva');
        $user->setEmail('elkate@mail.ru');
        $date = new DateTimeImmutable("1996-11-13 16:27 Europe/Moscow");
        $user->setBirthDate(\DateTime::createFromImmutable($date));
        $manager->persist($user);

        $user = new User();
        $user->setFirstName('John');
        $user->setSecondName('Smith');
        $date = new DateTimeImmutable("1985-03-18 00:55 Europe/London");
        $user->setBirthDate(\DateTime::createFromImmutable($date));
        $user->setEmail('JohnSmith@mail.ru');
        $manager->persist($user);

        $manager->flush();
    }
}
