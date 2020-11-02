provider "aws" {
  access_key = "AKIAIAQVOLN2TTYALXIA"
  secret_key = "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"
  region     = "ap-southeast-2"
}

resource "aws_instance" "Servidor1" {
  ami             = "ami-07a3bd4944eb120a0"
  instance_type   = "t2.micro"
  key_name        = "PASIR"
  security_groups = [ "grupo_de_seguridad" ]
}

resource "aws_security_group" "grupo_de_seguridad" {
  name        = "grupo_de_seguridad"
  description = "Permitir SSH y HTTP"

  ingress {
    from_port = 22
    to_port = 22
    protocol = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }    

  ingress {
    from_port = 80
    to_port = 80
    protocol = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }

  egress {
    from_port = 0
    to_port = 0
    protocol = "-1"
    cidr_blocks = ["0.0.0.0/0"]
  }

}

output "ip" {
  value = "${aws_instance.Servidor1.public_ip}"
}
