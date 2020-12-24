class nginx ($file = 'default', $ssl = false, $bundle_file = 'bundle.crt', $key_file = 'private.key') {
  package { "nginx":
    ensure => present
  }

  if ($ssl) {
    file { '/var/www/ssl':
      ensure => "directory",
      owner => "www-data",
      group => "www-data"
    }

    file { "bundle":
      path => "/var/www/ssl/${bundle_file}",
      source => "puppet:///modules/nginx/${bundle_file}",
      owner => 'root',
      group => 'root',
      require => [Package['nginx'], File['/var/www/ssl']]
    }

    file { "key":
      path => "/var/www/ssl/${key_file}",
      source => "puppet:///modules/nginx/${key_file}",
      owner => 'root',
      group => 'root',
      require => [Package['nginx'], File['/var/www/ssl']]
    }

    file { '/etc/nginx/sites-available/default':
      source => "puppet:///modules/nginx/${file}",
      owner => 'root',
      group => 'root',
      notify => Service['nginx'],
      require => [Package['nginx'], File['/var/www/ssl'], File["bundle"], File["key"]]
    }
  } else {
    file { '/etc/nginx/sites-available/default':
      source => "puppet:///modules/nginx/${file}",
      owner => 'root',
      group => 'root',
      notify => Service['nginx'],
      require => [Package['nginx']]
    }
  }

  service { "nginx":
    ensure => running,
    require => Package["nginx"]
  }
}
