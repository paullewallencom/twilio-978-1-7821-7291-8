group { 'puppet': ensure => 'present' }

host { 'packt-video-series.local':
    ip => '127.0.0.1',
    host_aliases => 'localhost',
}

class {
    'nginx':
        file => 'default'
}

class {
    'php':
        nginx => true
}

class wget { package{ 'wget': ensure => present } }
class gcc { package{ 'gcc': ensure => present } }

package { "curl":
    ensure => present
}

package {"php5-mysql":
    ensure => present
}

package { "git-core":
    ensure => present
}

package { "postfix":
    ensure => present
}

package { "mailutils":
    ensure => present
}

import "beanstalkd"
include beanstalkd

include supervisor

supervisor::service {'pusher':
    ensure => present,
    command => '/usr/bin/php /var/www/repo/src/private/console pusher:push',
    user => 'root',
    group => 'root',
    autorestart => true,
    startsecs => 0,
    require => [Package['php5-cli'], Package['beanstalkd']]
}
