# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

  config.vm.box = "ubuntu/trusty64"

  config.vm.network "private_network", ip: "10.11.100.200"
  config.vm.hostname = "packt-video-series.local"

  config.vm.synced_folder ".", "/var/www/repo", type: "nfs"

  config.vm.provision :shell, :path => "provision/shell/prepare.sh"
  config.vm.provision :puppet do |puppet|
    puppet.manifests_path = "provision/puppet/manifests"
    puppet.manifest_file  = "vagrant.pp"
    puppet.module_path = "provision/puppet/modules"
  end
  config.vm.provision :shell, :path => "provision/shell/post-puppet.sh"

end
