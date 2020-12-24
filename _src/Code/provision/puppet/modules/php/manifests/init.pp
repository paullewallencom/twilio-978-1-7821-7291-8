class php ($nginx = true) {

    if ($nginx) {
        package { "php5-fpm":
          ensure => present,
          subscribe => [Package['php5-dev'], Package['php5-curl'], Package['php5-gd'], Package['php5-imagick'], Package['php5-mcrypt'], Package['php5-mhash'], Package['php5-pspell'], Package['php5-json'], Package['php5-xmlrpc'], Package['php5-xsl'], Package['php5-mysql']]
        }
    }

    package { "php5-dev":
        ensure => present
    }

    package { "php5-curl":
        ensure => present
    }

    package { "php5-gd":
        ensure => present
    }

    package { "php5-imagick":
        ensure => present
    }

    package { "php5-mcrypt":
        ensure => present
    }

    package { "php5-mhash":
        ensure => present
    }

    package { "php5-pspell":
        ensure => present
    }

    package { "php5-xmlrpc":
        ensure => present
    }

    package { "php5-xsl":
        ensure => present
    }

    package { "php5-cli":
        ensure => present
    }

    package { "php5-json":
        ensure => present
    }
}
