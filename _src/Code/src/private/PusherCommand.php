<?php
class PusherCommand extends \CentralApps\Commands\AbstractPheanstalkCommand
{
    protected function configure()
    {
        $this->setName('pusher:push')->setDescription('Push some data to pusher');
    }

    protected function execute(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output)
    {
        $job = $this->container['pheanstalk']->watch('pusher')->ignore('default')->reserve();

        try {
            $data = json_decode($job->getData(), true);

            $this->container['pusher']->trigger(
                'private-packt4',
                $data['event_name'],
                $data
            );

            $output->writeln('<comment>Pushed data to pusher</comment>');
        } catch (\Exception $e) {
            $output->writeln('<error>Failed to perform job because: ' . $e->getMessage() . '</error>');
        }

        $this->container['pheanstalk']->delete($job);
        $output->writeln('<comment>Job deleted</comment>');
    }
}
