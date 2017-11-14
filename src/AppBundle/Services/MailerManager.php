<?php

namespace AppBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface;

class MailerManager
{
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function send($to, $subject, $body)
    {
        $message = \Swift_Message::newInstance()
            ->setTo($to)
            ->setFrom([$this->container->getParameter('mailer_sender') => $this->container->getParameter('title')])
            ->setSubject($subject)
            ->setBody($body, 'text/html')
            ->addPart(strip_tags(preg_replace('/\<br(\s*)?\/?\>/i', PHP_EOL, $body)), 'text/plain');

        $this->container->get('mailer')->send($message);
    }
}